<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Admin\Admin;
// use Illuminate\Http\Request;
// use Hash;
// use DB;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Validation\ValidationException;


// class LoginController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware(function ($request, $next) {
//             if ($request->session()->has('admin')) {
//                 return redirect()->route('admin.dashboard');
//             }
//             return $next($request);
//         });
//     }

//     public function index()
//     {
//         if (!empty(session('id'))) {
//             return redirect()->route('admin.dashboard');
//         }
//         $g_setting = DB::table('general_settings')->where('id', 1)->first();
//         return view('admin.auth.login', compact('g_setting'));
//     }

//     public function store(Request $request)
//     {
//         $check_email = Admin::where('email', $request->email)->first();
    
//         if ($check_email) {
//             // Update last login time
//             $check_email->last_login_at = now();
//             $check_email->save();
//         }
    
//         if (!$check_email) {
//             return redirect()->back()->with('error', 'Email address not found');
//         } elseif ($check_email->isLocked()) {
//             return back()->with('error', __('Your account is locked. Please try again later.'));
//         } else {
//             // Check password
//             $saved_password = $check_email->password;
//             $given_password = $request->password;
//             if (Hash::check($given_password, $saved_password) == false) {
//                 if (!$request->email == 'admin@ginicoe.com') {
//                     Cache::increment("try_{$check_email->id}");
//                     $check_email->incrementAttempts();
//                     if ($check_email->loginAttemptsExceeded()) {
//                         // Notify the user about unusual login activity via email
//                         $check_email->sendUnusualLoginEmail();
//                         // Lock the user's account for 30 minutes
//                         if (!$request->email == 'admin@ginicoe.com') {
//                             $check_email->lockAccount();
//                             return redirect()->back()->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
//                         }
//                     }
//                 }
//                 return redirect()->back()->with('error', 'Password is wrong');
//             }
//         }
    
//         // Check if the user is active
//         if ($check_email->status == 0) {
//             Cache::increment("try_{$check_email->id}");
//             return redirect()->back()->with('error', 'Customer is not active');
//         }
    
//         // Saving session data
//         session(['name' => $check_email->name]);
//         session(['email' => $check_email->email]);
//         session(['photo' => $check_email->photo]);
//         session(['phone' => $check_email->phone]);
    
//         // Check if MFA is enabled and not verified yet
//         if ($check_email->mfa_enabled && !$check_email->mfa_verified) {
//             // Generate and send the MFA code
//             $check_email->generateCodeAndSend($check_email->id);
    
//             // Redirect to MFA verification page
//             return redirect()->route('2fa.index');
//         }
    
//         // Clear the cache
//         Cache::forget("try_{$check_email->id}");
    
//         // Redirect to the admin dashboard
//         return redirect()->route('admin.dashboard');
//     }
    

//     public function unlock($id)
//     {
//         // Find the user based on the token and unlock the account
//         $user = Admin::where('id', $id)->first();

//         if ($user) {
//             $user->unlockAccount(); // Implement this method in your User model
//             // Redirect the user to the login page or a success page
//             return redirect()->route('admin.login')->with('success', 'Your account has been unlocked.');
//         }

//         // If the token is invalid or expired, handle it accordingly
//         // You can redirect the user to an error page or perform other actions

//         // Redirect to the login page with an error message
//         return redirect()->route('admin.login')->with('error', 'Invalid or expired unlock token.');
//     }
//     public function protect_account()
//     {
//         return view('protect-account');
//     }
// }

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware(function ($request, $next) {
    //     //     if ($request->session()->has('admin')) {
    //     //         return redirect()->route('admin.dashboard');
    //     //     }
    //     //     return $next($request);
    //     // });

    //     $this->middleware(function ($request, $next) {
    //         $routeName = optional($request->route())->getName();
        
    //         // Allow MFA setup routes to pass
    //         if (str_starts_with($routeName, 'mfa.')) {
    //             return $next($request);
    //         }
        
    //         // Redirect if already fully logged in
    //         if (
    //             $request->session()->has('admin') &&
    //             $request->session()->get('mfa_verified') === true
    //         ) {
    //             return redirect()->route('admin.dashboard');
    //         }
        
    //         return $next($request);
    //     });
        
    // }


    public function __construct()
{
    $this->middleware(function ($request, $next) {
        Log::info("ROUTE: " . optional($request->route())->getName());

        $routeName = optional($request->route())->getName();

        // Allow MFA setup routes to pass
        if (str_starts_with($routeName, 'mfa.')) {
            return $next($request);
        }

        // Redirect if already fully logged in
        if (
            $request->session()->has('admin') &&
            $request->session()->get('mfa_verified') === true
        ) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    });
}


    public function index()
    {
        if (!empty(session('id'))) {
            return redirect()->route('admin.dashboard');
        }
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        return view('admin.auth.login', compact('g_setting'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $check_email = Admin::where('email', $request->email)->first();
        if ($check_email) {
            $check_email->last_login_at = now();
            $check_email->save();
        }
        if (!$check_email) {
            return redirect()->back()->with('error', 'Email address not found');
        } elseif ($check_email->isLocked()) {
            return back()->with('error', __('Your account is locked. Please try again later.'));
        } else {
            $saved_password = $check_email->password;
            $given_password = $request->password;
            if (Hash::check($given_password, $saved_password) == false) {
                if (!$request->email == 'admin@ginicoe.com') {
                    Cache::increment("try_{$check_email->id}");
                    $check_email->incrementAttempts();
                    if ($check_email->loginAttemptsExceeded()) {
                        // Notify the user about unusual login activity via email
                        $check_email->sendUnusualLoginEmail();
                        // Lock the user's account for 30 minutes
                        if (!$request->email == 'admin@ginicoe.com') {
                            $check_email->lockAccount();
                            return redirect()->back()->with('error', __('Unusual login activity detected. Your account is locked for 30 minutes.'));
                        }
                    }

                }
                return redirect()->back()->with('error', 'Password is wrong');
            }
        }

        if ($check_email->status == 0) {
            Cache::increment("try_{$check_email->id}");
            return redirect()->back()->with('error', 'Customer is not active');
        }

        // Saving data into session
        // session(['role' => 'admin']);
        // session(['id' => $check_email->id]);
        session(['name' => $check_email->name]);
        session(['email' => $check_email->email]);
        session(['photo' => $check_email->photo]);
        // session(['role_id' => $check_email->role_id]);
        session(['phone' => $check_email->phone]);
         session()->save();
        return redirect()->route('mfa.select');
        // Clear the cache
        Cache::forget("try_{$check_email->id}");

        // Redirect to the admin dashboard
        return redirect()->route('2fa.index');
    }

    public function unlock($id)
    {
        // Find the user based on the token and unlock the account
        $user = Admin::where('id', $id)->first();

        if ($user) {
            $user->unlockAccount(); // Implement this method in your User model
            // Redirect the user to the login page or a success page
            return redirect()->route('admin.login')->with('success', 'Your account has been unlocked.');
        }

        // If the token is invalid or expired, handle it accordingly
        // You can redirect the user to an error page or perform other actions

        // Redirect to the login page with an error message
        return redirect()->route('admin.login')->with('error', 'Invalid or expired unlock token.');
    }
    public function protect_account()
    {
        return view('protect-account');
    }
}



