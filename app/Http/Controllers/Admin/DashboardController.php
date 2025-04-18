<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        
        return view('admin.home');
    }
    public function social()
    {
        return view('admin.socialjustice');
    }
    public function settings(Request $request)
    {   
        $google2fa = new Google2FA();
        $secret = $google2fa->generateSecretKey();

        $registration_data = $request->all();
        $registration_data["google2fa_secret"] = $secret;

        $request->session()->put('registration_data', $registration_data);

        $QR_Image = $google2fa->getQRCodeUrl(
            config('app.name'),
            session()->get('email'),
            $secret
        );
        $imgQR = $this->generateQrCode($QR_Image);

        return view('admin.settings')->with('secret' , $secret)->with('QR_Image' , $imgQR);
    }
    // public function completeRegistration(Request $request)
    // {        
    //     // add the session data back to the request input
    //     $request->merge(session('registration_data'));

    //     // Call the default laravel authentication
    //     return $this->registration($request);
    // }
    public function verify2fa(Request $request)
    {
        // Assume $inputCode is the code the user entered
        $inputCode = $request->input('2fa_code');

        // Get the user's stored secret
        $google2fa_secret = $request->session()->get('registration_data')['google2fa_secret'];

        $google2fa = new Google2FA();
        $isValid = $google2fa->verifyKey($google2fa_secret, $inputCode);

        if ($isValid) {
            // Code is valid, proceed with authentication
            return response()->json(['success' => true]);
        } else {
            // Code is invalid, handle the failure
            return response()->json(['success' => false]);
        }

    }

    public function custom_generate_qrcode_url($qrCodeUrl) {
        $qrCode = new QrCode($qrCodeUrl);
        $qrCodeImage = $qrCode->writeString(); // This generates a Data URI (base64 encoded image)
        return $qrCodeImage;
    }
    public function generateQrCode($qrCodeUrl)
    {
        // Create a QR code instance with the content you want
        $qrCode = new QrCode($qrCodeUrl);
        $qrCode->setSize(300);  // Set the QR code size
        $qrCode->setMargin(10); // Set the margin around the QR code
        // $qrCode->setEncoding('UTF-8'); // Set the encoding
        $qrCode->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8')); // Use the Encoding class

        // Optional: Set error correction level
        // $qrCode->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevel('L'));

        // Optional: Set foreground and background color
        $qrCode->setForegroundColor(new \Endroid\QrCode\Color\Color(0, 0, 0));  // Black
        $qrCode->setBackgroundColor(new \Endroid\QrCode\Color\Color(255, 255, 255));  // White

        // Create an instance of the PngWriter
        $writer = new PngWriter();


        $str = $writer->write($qrCode)->getString(); // Use write() and then getString()

        return base64_encode($str);

        // $qrCode = new QrCode('https://www.example.com');
        // $qrCode->setSize(300);
        // $qrCode->setMargin(10);
        // $qrCode->setEncoding('UTF-8');
        // $qrCode->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelL());

        // $writer = new PngWriter();
        // $qrCodeImage = $writer->writeString($qrCode);

        // $base64QrCode = base64_encode($qrCodeImage);
        // Generate the QR code image and return it directly to the browser
        // return $writer->writeString($qrCode);
    }
    public function knowledge()
    {
        return view('admin.knowledge');
    }
}
