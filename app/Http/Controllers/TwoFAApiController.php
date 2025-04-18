<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\AdminCode;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
// use Session;
use Illuminate\Support\Facades\Http;
use App\Notifications\UnusualLoginActivityNotification;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Session;

class TwoFAApiController extends Controller
{  
    public function verify(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

		$currentUserSecret = session('registration_data')["google2fa_secret"];
		if(!(isset($currentUserSecret) && !empty($currentUserSecret) && strlen($currentUserSecret) > 15)){
            return response()->json(['errors' => "No secret set for current user. Current Secret:.$currentUserSecret"], 422);
        }
    //    dd(session('google2fa_secret'), $request->code, $request->secret);
        $google2fa = new Google2FA();
        // Verify the code using the secret from the request
        $valid = $google2fa->verifyKey($currentUserSecret, $request->code);
        
        if ($valid) {
            // Code is valid
            $user = Admin::find(session('id'));
            if ($user) {
                if ($user->google2fa_secret === null && $request->has('secret') && !empty($request->secret)) {
                    $user->google2fa_secret = $request->secret;
                }
                $user->google2fa_enabled = true;
                $user->save();
                session(['google2fa_enabled' => 1]);   
                
                return response()->json([
                    'success' => true,
                    'message' => __('2FA verification successful')
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => __('User not found')
                ], 404);
            }
        } else {
            // Code is invalid
            return response()->json([
                'success' => false,
                'message' => __('Invalid 2FA code')
            ], 400);
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {  
        // Define validation rules for your request data
        $rules = [
            'code' => 'required', 
        ];

        // Define custom error messages (optional)
        $customMessages = [
            'code.required' => 'Please enter 2FA code', 
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }   
        $user=null;
        if($request->verification_id){
            $user = Admin::where('verification_id',$request->verification_id)->first();
        }else{
            $user = Admin::find(session('id'));
        }
        // Check if the user's account is locked
        if ($user->isLocked()) {
            //return back()->with('error', __('Your account is locked. Please try again later.'));
            return response()->json(['errors' => __('Your account is locked. Please try again later.')], 403);
        } 

        // Check if the code is correct and within the time limit
        $validCode = AdminCode::where('admin_id', $user->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(200))
            ->first();

        if (!is_null($validCode)) {
            // Clear login attempts upon successful login
            $user->clearLoginAttempts();
            Session::put('user_2fa', $user->id);
            //return redirect()->route('admin.dashboard');
            $api_token_val = Str::random(60);
            $user->token = $api_token_val;
            $user->save();
            //$user->expires_at = now(); 

            //$user->api_token =  hash('sha256', $api_token_val); 

            return response()->json(['success' => __('2FA verified successfully!'), 'token' => $api_token_val], 200);
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
                //return redirect()->route('admin.login')->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
                return response()->json(['errors' => __('Unusual login activity detected. Your account is locked for 30 minutes.')], 403);
                
            }

            //return back()->with('error', __('You entered the wrong code.'));
            return response()->json(['errors' => __('You entered the wrong code.')], 403);
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
        $rules = [
            'code' => 'required', 
        ];

        // Define custom error messages (optional)
        $customMessages = [
            'code.required' => 'Please enter 2FA code', 
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }

        $find = AdminCode::where('admin_id', session('id'))
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(200))
            ->first();

        if (!is_null($find)) {
            Session::put('user_2fa', session('id'));
            //return redirect()->route('admin.dashboard');

            return response()->json(['success' => __('2FA verified successfully!')], 200);	
        } 

        return response()->json(['error' => env('PROJECT_NOTIFICATION')], 403);	

        //return back()->with('error', 'You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        Admin::find(session('id'))->generateCodeAndSend();
        return response()->json(['success' => __('2FA resend successfully!')], 200);	

       // return back()->with('success', 'We sent you code on your mobile number.');
    }
}
