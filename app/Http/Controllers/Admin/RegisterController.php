<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmailToCustomer;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use App\Models\CommonlyUsedPassword;
use App\Models\Customer;
use App\Models\OldPassword;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function index()
    {

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $roles = Role::select('id', 'role_name')->get();
        return view('admin.auth.register', compact('g_setting', 'roles'));
    }

    public function store(Request $request)
    {
        try {
            if (env('PROJECT_MODE') && env('PROJECT_MODE') == 0) {
                return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
            }

            $g_setting = DB::table('general_settings')->where('id', 1)->first();
            $token = hash('sha256', time());
            $admin = new Admin();
            $data = $request->only($admin->getFillable());

            $parts = preg_split('/\s+/', $request->name);

            foreach ($parts as $part) {
                if (str_contains($request->password, $part)) {
                    throw ValidationException::withMessages(['contain_name' => __('You can not use name in your password')]);
                }
            }


            if (count($this->checkBankNameValidation($request->password)) > 0) {
                throw ValidationException::withMessages(['consec_char' => __('We have a little problem. Please remove bank name from the Password.')]);
            }
            if (CommonlyUsedPassword::where('password', $request->password)->exists()) {
                throw ValidationException::withMessages(['commonly_used_password' => __('we have a little problem commonly used passwords are not allowed')]);
            }


            $request->validate(
                [
                    'name' => 'required|max:50',
                    'email' => 'required|email|max:80|unique:admins',
                    'password' => 'required|min:8|max:32',
                    'phone' => 'required|max:20',

                ],
                [],
                [
                    'name' => 'Name',
                    'email' => 'Email',
                    'password' => 'Password',
                ]
            );
            $data['password'] = Hash::make($request->password);
            $data['token'] = $token;
            $data['photo'] = "user-1.jpg";
            $data['status'] = 1;
            $data['phone'] = "+1" . $request->phone;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['role_id'] = $request->role_id;

            $admin->fill($data)->save();
            OldPassword::create(['admin_id' => $admin->id, 'password' => $admin->password]);


            // Send Email
            $email_template_data = DB::table('email_templates')->where('id', 6)->first();
            $subject = $email_template_data->et_subject;
            $message = stripslashes($email_template_data->et_content);

            $verification_link = url("admin/registration/verify"); // . $token . '/' . base64_encode($admin->id)
            $verification_link =  $verification_link . '/' . $token . '/' . base64_encode($admin->id);

            $message_txt = str_replace("[[verification_link]]", $verification_link, $message);

            Mail::to($request->email)->send(new RegistrationEmailToCustomer($subject, $message_txt));

            return redirect()->back()->with('success', 'Please check your email to verify your registration. Check your spam folder too.');
        }
        catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->errors());
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function verify()
    {
        //$email_from_url = request()->segment(count(request()->segments()));
        //$aa = DB::table('admins')->where('email', $email_from_url)->first();
        $usrid_from_url = request()->segment(count(request()->segments()));
        $usrid_from_url = base64_decode($usrid_from_url);

        $aa = DB::table('admins')->where('id', $usrid_from_url)->first();

        if (!$aa) {
            return redirect()->route('admin.login');
        }

        // $expected_url = url('admin/registration/verify/' . $aa->token . '/' . $aa->email);
        $expected_url = url('admin/registration/verify/' . $aa->token . '/' . base64_encode($aa->id));
        $current_url = url()->current();
        if ($expected_url != $current_url) {
            return redirect()->route('admin.login');
        }

        $data['status'] = 1;
        $data['token'] = '';
        //Admin::where('email', $email_from_url)->update($data);

        Admin::where('id', $usrid_from_url)->update($data);

        return redirect()->route('admin.login')->with('success', 'Registration is completed. You can now login.');
    }

    public function checkBankNameValidation($password)
    {
        $banks = array(
            "5th 3rd",
            "Acorns",
            "Alliance Data",
            "Alliant Credit Union",
            "Ally",
            "Ally Mobile Banking",
            "AloStar Commerce",
            "American Express",
            "America",
            "Internet USA",
            "Bank5 Connect",
            "Barclays Delaware",
            "BB&T",
            "BBVA",
            "Betterment",
            "BMO Harris Mobile Banking",
            "Capital One",
            "Capital One 360",
            "Charles Schwab",
            "Chase Mobile",
            "Chime",
            "CIT",
            "Citi Mobile",
            "Citibank",
            "Compass",
            "Connexus Credit Unition",
            "Credit One",
            "Discover",
            "E*Trade Mobile",
            "E-Trade",
            "Fidelity",
            "FifthThird",
            "Fintech",
            "First National",
            "First Premiere",
            "Goldman Sachs",
            "HSBC",
            "Incredible",
            "JPMorganChase",
            "Key",
            "LearnVest",
            "M1 Finance",
            "Micro investment",
            "Mint",
            "Motif Explorer",
            "Moven",
            "Nationwide",
            "Nationwide",
            "Navy Federal Credit Union",
            "Pentagon Federal Credit Union",
            "PNC",
            "Reddit",
            "Regions",
            "Robinhood",
            "Rocket Mortgage",
            "Sallie Mae",
            "SigFg",
            "Simple – Better Banking",
            "Simplify With Apps and Services",
            "SoFi Lending",
            "Stash",
            "Stockpile",
            "Sun Trust",
            "SunTrust",
            "Synchrony",
            "TD Ameritrade",
            "TD",
            "TradeHero",
            "Truist",
            "U.S.",
            "Union",
            "USAA",
            "Wealthfront",
            "Wells Fargo",
            "Yahoo",
            "YNA"
        );

        $string_to_check = $password;
        $matches = array_filter($banks, function ($bank) use ($string_to_check) {
            return strpos($string_to_check, $bank) !== false;
        });
        return $matches;
    }

    public function check_guid(Request $request)
    {
        return response()->json(['exist' => Admin::where('guid', $request->guid)->exists()]);
    }
}
