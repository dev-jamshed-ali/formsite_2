<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
//use Hash;
use DB;

class LoginController extends Controller
{
    public $successStatus = 200;
    public function __construct()
    {
       /*  $this->middleware(function ($request, $next) {
            if ($request->session()->has('admin')) {
                return redirect()->route('admin.dashboard');
            }
            return $next($request);
        }); */

        $this->middleware(function ($request, $next) {
            if ($request->session()->has('admin')) {
                //return redirect()->route('admin.dashboard');
                return response()->json(['success' => __('Already loginned!')], $this->successStatus);
            }
            return $next($request);
        });
    }  

	public function store(Request $request){
        // Define validation rules for your request data
        $rules = [ 
            'email' => 'required|email|max:80', 
            'password' => 'required',
        ];
        // Define custom error messages (optional)
        $customMessages = [
            'email.required' => 'Email is required field',
            'email.email' => 'Enter a valid Email address',
            'email.max' => 'Email should be max 80 characters',
            'password.required' => 'Password is required field',
        ];
        
        $validator = Validator::make($request->all(), $rules, $customMessages);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $check_email = Admin::where('email', $request->email)->first();
        if ($check_email) {
            $check_email->last_login_at = now();
            $check_email->save();
        }
        
        if(!$check_email) { 
            return response()->json(['error' => __('Email address not found')], 403);
        }elseif($check_email->isLocked()){ 
            return response()->json(['error' => __('Your account is locked. Please try again later.')], 403);
        }else {
            $saved_password = $check_email->password;
            $given_password = $request->password;

            if (Hash::check($given_password, $saved_password) == false) {
                Cache::increment("try_{$check_email->id}");
                $check_email->incrementAttempts();
                if ($check_email->loginAttemptsExceeded()) {
                    // Notify the user about unusual login activity via email
                    $check_email->sendUnusualLoginEmail();
                    // Lock the user's account for 30 minutes
                    $check_email->lockAccount();
                    return response()->json(['error' => __('Unusual login activity detected. Your account is locked for 30 minutes.')], 403);
                }
                
                return response()->json(['error' => __('Password is wrong')], 403);
            }
        }

        if ($check_email->status == 0) {
            Cache::increment("try_{$check_email->id}"); 
            return response()->json(['error' => __('Customer is not active')], 403);
        }

        // Saving data into session
        session(['role' => 'admin']);
        session(['id' => $check_email->id]);
        session(['name' => $check_email->name]);
        session(['email' => $check_email->email]);
        session(['photo' => $check_email->photo]);
        session(['role_id' => $check_email->role_id]);
        session(['phone' => $check_email->phone]);

        
        // Generate and send the verification code
        $verification=$check_email->generateCodeAndSend($check_email->id);
        $data = array("id" => $check_email->id, 
        "name" => $check_email->name,
        "email" => $check_email->email,
        "photo" => $check_email->photo,
        "role_id" => $check_email->role_id,
        "phone" => $check_email->phone,
        "status" => $check_email->status, 
        "verification_id" =>  $verification, 
        "last_login_at" => $check_email->last_login_at,
        "created_at" => $check_email->created_at,
        "updated_at" => $check_email->updated_at); 
        //return redirect()->route('2fa.index');

        return response()->json(['success' => __('Loginned successfully, please verify 2fa.'), 'data' => $data], $this->successStatus);
        // Clear the cache
        Cache::forget("try_{$check_email->id}");

        // Redirect to the admin dashboard
       // return redirect()->route('admin.dashboard');
    }

   public function unlock($id)
	{
		// Find the user based on the token and unlock the account
		$user = Admin::where('id', $id)->first();
		if ($user) {
			$user->unlockAccount(); // Implement this method in your User model
			// Redirect the user to the login page or a success page
			//return redirect()->route('admin.login')->with('success', 'Your account has been unlocked.');

            return response()->json(['success' => __('Your account has been unlocked.')], $this->successStatus);
		}

		// If the token is invalid or expired, handle it accordingly
		// You can redirect the user to an error page or perform other actions

		// Redirect to the login page with an error message
		//return redirect()->route('admin.login')->with('error', 'Invalid or expired unlock token.');

        return response()->json(['error' => __('Invalid or expired unlock token.')], 403);
	}

    public function protect_account(){
        //return view('protect-account');

        return false;
    }
}
