<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToAdmin;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        $general_setting = DB::table('general_settings')
        ->where('id', 1)
        ->first();
    	return view('admin.auth.forget_password')->with('general_setting',$general_setting);
    }

    public function store(Request $request)
    {
 try {
        //    if(env('PROJECT_MODE') == 0) {
          //      return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
            //}
       
            
            $request->validate([
                'email' => 'required|email|max:80'
            ]);
		     //   dd($request);
    
            $check_email = Admin::where('email',$request->email)->first();
            if(!$check_email)
            {
                return redirect()->back()->with('error', 'Email address not found');
            }
            else
            {
                $email_template_data = DB::table('email_templates')->where('id', 5)->first();
                $subject = $email_template_data->et_subject;
                $message = $email_template_data->et_content;
    
                $token = hash('sha256',time());
                //$reset_link = url('admin/reset-password/'.$token.'/'.urlencode($request->email));
                $reset_link = url('admin/reset-password/'.$token.'/'.base64_encode($check_email->id));
                $message = str_replace('[[reset_link]]', $reset_link, $message);
    
                $data['token'] = $token;
                Admin::where('email', $check_email->email)->update($data);
    
                Mail::to($request->email)->send(new ResetPasswordMessageToAdmin($subject,$message));
            }
            return redirect()->back()->with('success', 'Please check your email for reset instruction');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'something went wrong');
        }
        
    }

}
