<?php

namespace App\Http\Controllers;

use App\Models\User;
use BaconQrCode\Writer;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;

use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Log;
use BaconQrCode\Renderer\ImageRenderer;
use Illuminate\Support\Facades\Session;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;



class MFAController extends Controller
{
    public function selectMethod()
    {
        // Retrieve session data (email and phone)
        $email = session('email');
        $phone = session('phone');

        // Pass data to the view (email and phone for reference)
        return view('mfa.select-method', compact('email', 'phone'));
    }

    public function handleMethod(Request $request)
    {
        $method = $request->input('method');

        // Retrieve the user from session (email should be in session)
        $email = session('email');
        $check_email = Admin::where('email', $email)->first();

        if (!$check_email) {
            return back()->with('error', 'Email not found');
        }

        if ($method === 'phone') {
            // If phone method is selected, generate and send MFA code to the phone
            $check_email->generateCodeAndSend($check_email->id);
            return redirect()->route('2fa.index');
        }

        if ($method === 'google_authenticator') {
            // If TOTP is selected, generate a QR code for Google Authenticator
            return redirect()->route('mfa.totp');
        }

        // If no valid method is selected
        return back()->with('error', 'Invalid method selected.');
    }




    public function totp(Request $request)
    {
        $email = session('email');
        info('email' . $email);
        $user =  Admin::where('email', $email)->first();
        if ($user->mfa_verified == 1) {
            session(['email' => $email]);
            return redirect()->route('mfa.verify.code');
        }
        if (!$email) {
            return redirect()->route('admin.login')->with('error', 'Session expired. Please log in again.');
        }
        $google2fa = new \PragmaRX\Google2FA\Google2FA();
        $secret = $google2fa->generateSecretKey();
        session(['mfa_secret' => $secret]);

        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $email,
            $secret
        );

        // Use Google Charts API as fallback

        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        $qrCodeSvg = $writer->writeString($qrCodeUrl);
        
        $qrImage = $qrCodeSvg; // SVG is returned as a string, directly embeddable in HTML
        

        $qrImage = 'https://quickchart.io/qr?text=' . urlencode($qrCodeUrl);

        return view('mfa.settings', [
            'qrImage' => $qrImage,
            'secret' => $secret
        ]);
    }
    public function verifyTotp(Request $request)
    {
     
      
        $email = session('email');
        $check_email = Admin::where('email', $email)->first();

        if (!$check_email) {
            return redirect()->route('admin.login')->with('error', 'Session expired. Please log in again.');
        }

        $google2fa = new Google2FA();
        $secret = session('mfa_secret');
        info('secret ' . $secret);
        info('code ' . $request->input('code'));

        // Verify the code
        $valid = $google2fa->verifyKey($secret, $request->input('code'));

        if ($valid) {
            // Update MFA settings
            $check_email->update([
                'mfa_type' => 'google_authenticator',
                'mfa_secret' => $secret,
                'mfa_enabled' => true,
                'mfa_verified' => true
            ]);

            // Regenerate session ID for security
            $request->session()->regenerate();

            // Set both admin and MFA verified flags
            session([
                'admin' => true,  // Required for your middleware
                'mfa_verified' => true,
                'email' => $email, // Persist email
            ]);
            session(['role' => 'admin']);
            session(['id' => $check_email->id]);
            session(['name' => $check_email->name]);
            session(['email' => $check_email->email]);
            session(['photo' => $check_email->photo]);
            session(['role_id' => $check_email->role_id]);
            session(['phone' => $check_email->phone]);
            session(['loged_in' => true]);

            // Force immediate session save
            session()->save();
            Session::put('user_2fa', $check_email->id);
            info('verification_id success');
            return redirect()->route('admin.dashboard');
        }
        session()->forget(['mfa_verified']);
        return back()->with('error', 'Invalid MFA code');
    }

    public function verifyForm()
    {
        // Show the MFA verification form (e.g., Google Authenticator code input)
        return view('mfa.verify');
    }

    public function verify(Request $request)
    {
        $email = session('email');
        $check_email = Admin::where('email', $email)->first();

        if (!$check_email) {
            return redirect()->route('admin.login')->with('error', 'Session expired. Please log in again.');
        }

        $google2fa = new Google2FA();

        // Verify the TOTP code provided by the user
        if ($google2fa->verifyKey($check_email->mfa_secret, $request->input('code'))) {
            // Update MFA verification status
            $check_email->update(['mfa_verified' => true]);

            // Store the MFA verification status in session
            session(['mfa_verified' => true]);
            Log::info('MFA verification successful.');
            return redirect()->route('admin.dashboard');
        }
        Log::info('MFA verification failed.');
        return back()->with('error', 'Invalid MFA code');
    }
    public function showTotpCodeForm()
    {
        $email = session('email');
        $user =  Admin::where('email', $email)->first();
        session(['mfa_secret' => $user->mfa_secret]);
        return view('mfa.code'); 
    }
}
