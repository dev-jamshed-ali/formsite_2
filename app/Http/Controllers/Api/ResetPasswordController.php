<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\CommonlyUsedPassword;
use App\Models\OldPassword;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use DB;
use Hash;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function update(Request $request){
        
        if (env('PROJECT_MODE') == 0) {  
            return response()->json(['error' => env('PROJECT_NOTIFICATION')], 403); 
        }

        $rw = DB::table('admins')->where('email', $request->email)->first();
        if($rw){
            $usr_id = $rw->id; 
            $user = Admin::with(['oldPassword'])->where('id', $usr_id)->first();
        }else{
            $user = Admin::with(['oldPassword'])->where('email', $request->email)->first();
        }

        /* 
        foreach ($user->oldPassword as $old_password) {
            if (Hash::check($request->new_password, $old_password->password)) {
                throw ValidationException::withMessages(['same_password' => __('You are not allowed to use your last 5 password to comply the password security policy.')]);
            }
        } 
        
        if ($user) {
            $parts = preg_split('/\s+/', $user->name); 
            foreach ($parts as $part) {  
                if (str_contains($request->new_password, $part)) {
                    throw ValidationException::withMessages(['contain_name' => __('You can not use name in your password')]);
                }
            }
        }
     
        if(count($this->checkBankNameValidation($request->new_password)) > 0){
            throw ValidationException::withMessages(['consec_char' => __('You can not use Bank Name in your Password')]);
        }

        if(CommonlyUsedPassword::where('password',$request->new_password)->exists()){
            throw ValidationException::withMessages(['commonly_used_password' => __('You can not use Commonly used password')]);
        } */

        $rules = [
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password',
        ];

        // Define custom error messages (optional)
        $customMessages = [
            'new_password.required' => 'Password is required field', 
            'retype_password.required' => 'Retype Password is required field',
            'retype_password.same' => 'Password & Retype Password must be same!', 
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }

        $data['password'] = Hash::make($request->new_password);
        $data['token'] = '';
        $admin = Admin::where('email', $request->email)->first();

        OldPassword::create(['admin_id' => $admin->id, 'password' => $admin->password]);

        $admin->update($data);

        return response()->json(['success' => __('Password is reset successfully!')], 200);  
    } 
    
    public function checkBankNameValidation($password){
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
        $matches = array_filter($banks, function($bank) use ($string_to_check) {
            return strpos($string_to_check, $bank) !== false;
        });
        return $matches;
    }
}
