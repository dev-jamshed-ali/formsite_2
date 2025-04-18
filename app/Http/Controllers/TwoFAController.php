<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\AdminCode;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;
use App\Notifications\UnusualLoginActivityNotification;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Google2FA\Google2FA;

class TwoFAController extends Controller
{

    public function index()
    {
        if (empty(session('verification_id'))) {
            return redirect()->route('admin.login');
        }
        return view('admin.auth.2fa');
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $verificationId = session('verification_id');
        if (!$verificationId) {
            return back()->with('error', __('Otp session is expired.'));
        }
        $user = Admin::where('verification_id', $verificationId)->first();
        // Check if the user's account is locked
        if ($user->isLocked()) {
            return back()->with('error', __('Your account is locked. Please try again later.'));
        }

        // Check if the code is correct and within the time limit
        $validCode = AdminCode::where('admin_id', $user->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(200))
            ->first();

        if (!is_null($validCode)) {
            // Clear login attempts upon successful login
            $user->clearLoginAttempts();
            session(['role' => 'admin']);
            session(['id' => $user->id]);
            session(['name' => $user->name]);
            session(['email' => $user->email]);
            session(['photo' => $user->photo]);
            session(['role_id' => $user->role_id]);
            session(['phone' => $user->phone]);
            Session::put('user_2fa', session('id'));
            return redirect()->route('admin.dashboard');
        } else {
            // Increment login attempts for the user
            $user->incrementAttempts();
            // Check if the login attempts exceed the limit
            if ($user->loginAttemptsExceeded()) {
                // Notify the user about unusual login activity via email
                $user->sendUnusualLoginEmail();
                // Lock the user's account for 30 minutes
                $user->lockAccount();
                // Send an SMS to the user about unusual login activity
                // $receiverNumber = session('phone');
                // $message = "Unusual login attempts on your Ginicoe account. Your account is locked for 30 minutes.";
                // // Use Twilio or another SMS service to send an SMS
                // $this->sendSMS($receiverNumber, $message);
                session()->forget('role');
                session()->forget('id');
                session()->forget('name');
                session()->forget('email');
                session()->forget('photo');
                return redirect()->route('admin.login')->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
                // return redirect()->route('admin.login')->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
            }

            return back()->with('error', __('You entered the wrong code.'));
        }
    }

    public function sendSMS($receiverNumber, $message)
    {
        // Your Twilio credentials
        $account_sid = "AC41065344bfee3057353188cd2cbdb669";
        $auth_token = "db60ac69f38c1dc155d63f9d8965c702";
        $twilio_number = "+12568575506";

        $client = new Client($account_sid, $auth_token);

        // Send the SMS
        $client->messages->create(
            $receiverNumber,
            [
                'from' => $twilio_number,
                'body' => $message,
            ]
        );
    }

    public function storeOld(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $find = AdminCode::where('admin_id', session('id'))
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(200))
            ->first();
        if (!is_null($find)) {
            Session::put('user_2fa', session('id'));
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        $admin = Admin::where('verification_id', session('verification_id'))->first();

        if ($admin) {
            $admin->generateCodeAndSend();
            return back()->with('success', 'We sent you code on your mobile number.');
        } else {
            return redirect()->route('admin.login')->withErrors(['verification_id' => 'Invalid verification ID']);
        }
    }

    public function google2fa()
    {
        // if (empty(session('verification_id'))) {
        //     return redirect()->route('admin.login');
        // }
        return view('admin.auth.google2fa');
    }
    public function google2fa_post(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        
        $verificationId = session('verification_id');
        if (!$verificationId) {
            return back()->with('error', __('2FA session is expired.'));
        }
        $user = Admin::where('verification_id', $verificationId)->first();

        // Check if the user's account is locked
        if ($user->isLocked()) {
            return back()->with('error', __('Your account is locked. Please try again later.'));
        }
		if(!(isset($user->google2fa_secret) && !empty($user->google2fa_secret) && strlen($user->google2fa_secret) > 15)){
            return back()->with('error', __('2FA is not enabled for your account.'));
        }
        // dd($user->google2fa_secret, $request->code);
        $google2fa = new Google2FA();
        // Verify the code using the secret from the session
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code);
        // dd($valid);
        if ($valid) {
                // $user->google2fa_enabled = true;
                // $user->save();
                 // Check if the code is correct and within the time limit
                $validCode = AdminCode::where('admin_id', $user->id)
                ->where('updated_at', '>=', now()->subMinutes(200))
                ->first();
                if (!is_null($validCode)) {
                    // Clear login attempts upon successful login
                    $user->clearLoginAttempts();
                    session(['role' => 'admin']);
                    session(['id' => $user->id]);
                    session(['name' => $user->name]);
                    session(['email' => $user->email]);
                    session(['photo' => $user->photo]);
                    session(['role_id' => $user->role_id]);
                    session(['phone' => $user->phone]);
                    session(['google2fa_secret' => $user->google2fa_secret]);   
                    session(['google2fa_enabled' => $user->google2fa_enabled]);   
                    Session::put('user_2fa', session('id'));
                    return redirect()->route('admin.dashboard');
                } else {
                    // Increment login attempts for the user
                    $user->incrementAttempts();
                    // Check if the login attempts exceed the limit
                    if ($user->loginAttemptsExceeded()) {
                        // Notify the user about unusual login activity via email
                        $user->sendUnusualLoginEmail();
                        // Lock the user's account for 30 minutes
                        $user->lockAccount();
                        // Send an SMS to the user about unusual login activity
                        // $receiverNumber = session('phone');
                        // $message = "Unusual login attempts on your Ginicoe account. Your account is locked for 30 minutes.";
                        // // Use Twilio or another SMS service to send an SMS
                        // $this->sendSMS($receiverNumber, $message);
                        session()->forget('role');
                        session()->forget('id');
                        session()->forget('name');
                        session()->forget('email');
                        session()->forget('photo');
                        return redirect()->route('admin.login')->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
                    }
                    return back()->with('error', __('You entered the wrong code.'));
                }
            } else {
                // Code is invalid
                return back()->with('error', __('Invalid 2FA code'));
            }
    
    }

    public function disable2fa()
    {
        $user = Admin::find(session('id'));
        $user->google2fa_enabled = false;
        $user->save();
        session(['google2fa_enabled' => 0]);   
        return back()->with('success', __('2FA has been disabled successfully.'));
    }
}
