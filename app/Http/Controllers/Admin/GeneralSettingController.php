<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GeneralSetting;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Log;
use App\Models\Admin\Role;
use Termwind\Components\Dd;


class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function logo_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.logo', compact('general_setting'));
    }

    public function logo_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        // Unlink old photo
        unlink(public_path('uploads/'.$request->current_photo));

        // Uploading new photo
        $ext = $request->file('logo')->extension();
        $final_name = 'logo'.'.'.$ext;
        $request->file('logo')->move(public_path('uploads/'), $final_name);

        $data['logo'] = $final_name;

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Logo is updated successfully!');

    }

    public function video_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.video', compact('general_setting'));
    }

    public function video_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'video' => 'required|mimes:mp4|max:300048'
        ]);

        // Unlink old photo
        if(file_exists(public_path('uploads/'.$request->current_video)))
        unlink(public_path('uploads/'.$request->current_video));

        // Uploading new photo
        $ext = $request->file('video')->extension();
        $final_name = 'video_'.time().'.'.$ext;
        $request->file('video')->move(public_path('uploads/'), $final_name);

        $data['video'] = $final_name;

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Video is updated successfully!');

    }

    public function favicon_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.favicon', compact('general_setting'));
    }

    public function favicon_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'favicon' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        // Unlink old photo
        unlink(public_path('uploads/'.$request->current_photo));

        // Uploading new photo
        $ext = $request->file('favicon')->extension();
        $final_name = 'favicon'.time().'.'.$ext;
        $request->file('favicon')->move(public_path('uploads/'), $final_name);

        $data['favicon'] = $final_name;

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Favicon is updated successfully!');

    }


    public function loginbg_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.loginbg', compact('general_setting'));
    }

    public function loginbg_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'login_bg' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        // Unlink old photo
        unlink(public_path('uploads/'.$request->current_photo));

        // Uploading new photo
        $ext = $request->file('login_bg')->extension();
        $final_name = 'login_bg'.'.'.$ext;
        $request->file('login_bg')->move(public_path('uploads/'), $final_name);

        $data['login_bg'] = $final_name;

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Login Background is updated successfully!');
    }



    public function topbar_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.topbar', compact('general_setting'));
    }

    public function topbar_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['top_bar_email'] = $request->get('top_bar_email');
        $data['top_bar_phone'] = $request->get('top_bar_phone');
        $data['top_bar_social_status'] = $request->get('top_bar_social_status');
        $data['top_bar_login_status'] = $request->get('top_bar_login_status');
        $data['top_bar_registration_status'] = $request->get('top_bar_registration_status');
        $data['top_bar_cart_status'] = $request->get('top_bar_cart_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Top Bar Information is updated successfully!');
    }

    public function footer_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.footer', compact('general_setting'));
    }

    public function footer_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['footer_address'] = $request->get('footer_address');
        $data['footer_email'] = $request->get('footer_email');
        $data['footer_phone'] = $request->get('footer_phone');
        $data['footer_copyright'] = $request->get('footer_copyright');
        $data['footer_column1_heading'] = $request->get('footer_column1_heading');
        $data['footer_column2_heading'] = $request->get('footer_column2_heading');
        $data['footer_column3_heading'] = $request->get('footer_column3_heading');
        $data['footer_column4_heading'] = $request->get('footer_column4_heading');
        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Footer Information is updated successfully!');
    }

    public function sidebar_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.sidebar', compact('general_setting'));
    }

    public function sidebar_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['sidebar_total_recent_post'] = $request->get('sidebar_total_recent_post');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Sidebar Information is updated successfully!');
    }


    public function color_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.color', compact('general_setting'));
    }

    public function color_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['theme_color'] = $request->get('theme_color');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Color is updated successfully!');
    }


    public function preloader_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.preloader', compact('general_setting'));
    }

    public function preloader_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->file('preloader_photo'))
        {
            $request->validate([
                'preloader_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);

            // Unlink old photo
            unlink(public_path('uploads/'.$request->current_photo));

            // Uploading new photo
            $ext = $request->file('preloader_photo')->extension();
            $final_name = 'preloader'.'.'.$ext;
            $request->file('preloader_photo')->move(public_path('uploads/'), $final_name);

            $data['preloader_photo'] = $final_name;
        }

        $data['preloader_status'] = $request->get('preloader_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Preloader Information is updated successfully!');
    }


    public function stickyheader_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.stickyheader', compact('general_setting'));
    }

    public function stickyheader_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['sticky_header_status'] = $request->get('sticky_header_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Sticky Header Setting is updated successfully!');
    }

    public function googleanalytic_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.googleanalytic', compact('general_setting'));
    }

    public function googleanalytic_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['google_analytic_tracking_id'] = $request->get('google_analytic_tracking_id');
        $data['google_analytic_status'] = $request->get('google_analytic_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Google Analytic Setting is updated successfully!');
    }


    public function googlerecaptcha_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.googlerecaptcha', compact('general_setting'));
    }

    public function googlerecaptcha_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['google_recaptcha_site_key'] = $request->get('google_recaptcha_site_key');
        $data['google_recaptcha_status'] = $request->get('google_recaptcha_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Google Recaptcha Setting is updated successfully!');
    }




    public function tawklivechat_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.tawklivechat', compact('general_setting'));
    }

    public function tawklivechat_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['tawk_live_chat_code'] = $request->get('tawk_live_chat_code');
        $data['tawk_live_chat_status'] = $request->get('tawk_live_chat_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Tawk Live Chat Setting is updated successfully!');
    }


    public function cookieconsent_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.cookieconsent', compact('general_setting'));
    }

    public function cookieconsent_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['cookie_consent_status'] = $request->get('cookie_consent_status');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', 'Cookie Consent Setting is updated successfully!');
    }

    public function banner_edit()
    {
        $general_setting = GeneralSetting::where('id',1)->first();
        return view('admin.general_setting.banner', compact('general_setting'));
    }

    public function banner_update(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->hasFile('banner_about'))
        {
            $request->validate([
                'banner_about' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_about')->extension();
            $final_name = 'banner_about'.'.'.$ext;
            $request->file('banner_about')->move(public_path('uploads/'), $final_name);
            $data['banner_about'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'About Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_service'))
        {
            $request->validate([
                'banner_service' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_service')->extension();
            $final_name = 'banner_service'.'.'.$ext;
            $request->file('banner_service')->move(public_path('uploads/'), $final_name);
            $data['banner_service'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Service Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_service_detail'))
        {
            $request->validate([
                'banner_service_detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_service_detail')->extension();
            $final_name = 'banner_service_detail'.'.'.$ext;
            $request->file('banner_service_detail')->move(public_path('uploads/'), $final_name);
            $data['banner_service_detail'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Service Detail Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_blog'))
        {
            $request->validate([
                'banner_blog' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_blog')->extension();
            $final_name = 'banner_blog'.'.'.$ext;
            $request->file('banner_blog')->move(public_path('uploads/'), $final_name);
            $data['banner_blog'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Blog Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_blog_detail'))
        {
            $request->validate([
                'banner_blog_detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_blog_detail')->extension();
            $final_name = 'banner_blog_detail'.'.'.$ext;
            $request->file('banner_blog_detail')->move(public_path('uploads/'), $final_name);
            $data['banner_blog_detail'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Blog Detail Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_category'))
        {
            $request->validate([
                'banner_category' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_category')->extension();
            $final_name = 'banner_category'.'.'.$ext;
            $request->file('banner_category')->move(public_path('uploads/'), $final_name);
            $data['banner_category'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Category Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_project'))
        {
            $request->validate([
                'banner_project' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_project')->extension();
            $final_name = 'banner_project'.'.'.$ext;
            $request->file('banner_project')->move(public_path('uploads/'), $final_name);
            $data['banner_project'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Project Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_project_detail'))
        {
            $request->validate([
                'banner_project_detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_project_detail')->extension();
            $final_name = 'banner_project_detail'.'.'.$ext;
            $request->file('banner_project_detail')->move(public_path('uploads/'), $final_name);
            $data['banner_project_detail'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Project Detail Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_team_member'))
        {
            $request->validate([
                'banner_team_member' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_team_member')->extension();
            $final_name = 'banner_team_member'.'.'.$ext;
            $request->file('banner_team_member')->move(public_path('uploads/'), $final_name);
            $data['banner_team_member'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Team Member Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_team_member_detail'))
        {
            $request->validate([
                'banner_team_member_detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_team_member_detail')->extension();
            $final_name = 'banner_team_member_detail'.'.'.$ext;
            $request->file('banner_team_member_detail')->move(public_path('uploads/'), $final_name);
            $data['banner_team_member_detail'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Team Member Detail Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_photo_gallery'))
        {
            $request->validate([
                'banner_photo_gallery' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_photo_gallery')->extension();
            $final_name = 'banner_photo_gallery'.'.'.$ext;
            $request->file('banner_photo_gallery')->move(public_path('uploads/'), $final_name);
            $data['banner_photo_gallery'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Photo Gallery Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_video_gallery'))
        {
            $request->validate([
                'banner_video_gallery' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_video_gallery')->extension();
            $final_name = 'banner_video_gallery'.'.'.$ext;
            $request->file('banner_video_gallery')->move(public_path('uploads/'), $final_name);
            $data['banner_video_gallery'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Video Gallery Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_faq'))
        {
            $request->validate([
                'banner_faq' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_faq')->extension();
            $final_name = 'banner_faq'.'.'.$ext;
            $request->file('banner_faq')->move(public_path('uploads/'), $final_name);
            $data['banner_faq'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'FAQ Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_product'))
        {
            $request->validate([
                'banner_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_product')->extension();
            $final_name = 'banner_product'.'.'.$ext;
            $request->file('banner_product')->move(public_path('uploads/'), $final_name);
            $data['banner_product'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Product Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_product_detail'))
        {
            $request->validate([
                'banner_product_detail' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_product_detail')->extension();
            $final_name = 'banner_product_detail'.'.'.$ext;
            $request->file('banner_product_detail')->move(public_path('uploads/'), $final_name);
            $data['banner_product_detail'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Product Detail Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_contact'))
        {
            $request->validate([
                'banner_contact' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_contact')->extension();
            $final_name = 'banner_contact'.'.'.$ext;
            $request->file('banner_contact')->move(public_path('uploads/'), $final_name);
            $data['banner_contact'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Contact Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_search'))
        {
            $request->validate([
                'banner_search' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_search')->extension();
            $final_name = 'banner_search'.'.'.$ext;
            $request->file('banner_search')->move(public_path('uploads/'), $final_name);
            $data['banner_search'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Search Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_cart'))
        {
            $request->validate([
                'banner_cart' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_cart')->extension();
            $final_name = 'banner_cart'.'.'.$ext;
            $request->file('banner_cart')->move(public_path('uploads/'), $final_name);
            $data['banner_cart'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Cart Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_checkout'))
        {
            $request->validate([
                'banner_checkout' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_checkout')->extension();
            $final_name = 'banner_checkout'.'.'.$ext;
            $request->file('banner_checkout')->move(public_path('uploads/'), $final_name);
            $data['banner_checkout'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Checkout Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_login'))
        {
            $request->validate([
                'banner_login' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_login')->extension();
            $final_name = 'banner_login'.'.'.$ext;
            $request->file('banner_login')->move(public_path('uploads/'), $final_name);
            $data['banner_login'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Login Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_registration'))
        {
            $request->validate([
                'banner_registration' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_registration')->extension();
            $final_name = 'banner_registration'.'.'.$ext;
            $request->file('banner_registration')->move(public_path('uploads/'), $final_name);
            $data['banner_registration'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Registration Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_forget_password'))
        {
            $request->validate([
                'banner_forget_password' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_forget_password')->extension();
            $final_name = 'banner_forget_password'.'.'.$ext;
            $request->file('banner_forget_password')->move(public_path('uploads/'), $final_name);
            $data['banner_forget_password'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Forget Password Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_customer_panel'))
        {
            $request->validate([
                'banner_customer_panel' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_customer_panel')->extension();
            $final_name = 'banner_customer_panel'.'.'.$ext;
            $request->file('banner_customer_panel')->move(public_path('uploads/'), $final_name);
            $data['banner_customer_panel'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Customer Panel Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_career'))
        {
            $request->validate([
                'banner_career' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_career')->extension();
            $final_name = 'banner_career'.'.'.$ext;
            $request->file('banner_career')->move(public_path('uploads/'), $final_name);
            $data['banner_career'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Career Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_job'))
        {
            $request->validate([
                'banner_job' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_job')->extension();
            $final_name = 'banner_job'.'.'.$ext;
            $request->file('banner_job')->move(public_path('uploads/'), $final_name);
            $data['banner_job'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Job Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_job_application'))
        {
            $request->validate([
                'banner_job_application' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_job_application')->extension();
            $final_name = 'banner_job_application'.'.'.$ext;
            $request->file('banner_job_application')->move(public_path('uploads/'), $final_name);
            $data['banner_job_application'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Job Application Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_term'))
        {
            $request->validate([
                'banner_term' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_term')->extension();
            $final_name = 'banner_term'.'.'.$ext;
            $request->file('banner_term')->move(public_path('uploads/'), $final_name);
            $data['banner_term'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Term Page Banner is updated successfully!');
        }

        if($request->hasFile('banner_privacy'))
        {
            $request->validate([
                'banner_privacy' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000'
            ]);
            unlink(public_path('uploads/'.$request->current_photo));
            $ext = $request->file('banner_privacy')->extension();
            $final_name = 'banner_privacy'.'.'.$ext;
            $request->file('banner_privacy')->move(public_path('uploads/'), $final_name);
            $data['banner_privacy'] = $final_name;
            GeneralSetting::where('id',1)->update($data);
            return redirect()->back()->with('success', 'Privacy Page Banner is updated successfully!');
        }

        return redirect()->back()->with('error', 'You must have to select a photo');

    }

    public function eula_update(Request $request)
    {
        try {

            $allTypes = config('constants.admin_types');
            $financial_institution_id = $allTypes['financial_institution'];
            $merchant_id = $allTypes['merchant'];
            $consumer_id = $allTypes['consumer'];
            $request->validate([
                'admin_type' => 'required|in:' . $financial_institution_id . ',' . $merchant_id . ',' . $consumer_id,
                'pdf_file' => 'required|mimes:pdf|max:10240',
            ]);

            if ($request->hasFile('pdf_file')) {
                $file = $request->file('pdf_file');
                $ext = $file->getClientOriginalExtension();
                
                $admin_type_map = array_flip(config('constants.admin_types'));
                $admin_type_name = $admin_type_map[$request->admin_type];
                $final_name = 'eula_' . $admin_type_name . '_' . time() . '.' . $ext;

                $file->move(public_path('uploads/'), $final_name);

                $data = [];
                if ($request->admin_type == $consumer_id) {
                    $data['eula_for_consumer'] = $final_name;
                } else if ($request->admin_type == $financial_institution_id) {
                    $data['eula_for_financial'] = $final_name;
                } else if ($request->admin_type == $merchant_id) {
                    $data['eula_for_merchant'] = $final_name;
                }   
                
                Admin::where('role_id', $request->admin_type)
                     ->update(['is_eula_checked' => false]);

                GeneralSetting::where('id', 1)->update($data);

                return redirect()->back()->with('success', 'EULA PDF uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No PDF file was uploaded.');
        } catch (\Exception $e) {
            \Log::error('EULA Upload Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error uploading EULA: ' . $e->getMessage());
        }
    }
    
    public function eula_agree(Request $request)
    {
        try {
            $request->validate([
                'eula_id' => 'required|exists:admins,id'
            ]);
    
            $admin = Admin::findOrFail($request->eula_id);
            
            $admin->update([
                'is_eula_checked' => true,
            ]);
    
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for agreeing to the EULA'
                ]);
            }
            
            return redirect()->back()->with('success', 'EULA agreement updated successfully!');
    
        } catch (\Exception $e) {
            \Log::error('EULA Agreement Error: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error processing your agreement: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error processing your agreement: ' . $e->getMessage());
        }
    }
    
    
    
    public function eula()
    {
        $general_setting = GeneralSetting::where('id', 1)->first();
        $allTypes = config('constants.admin_types');
        $financial_institution_id = $allTypes['financial_institution'];
        $merchant_id = $allTypes['merchant'];
        $consumer_id = $allTypes['consumer'];
        $admins = Admin::whereIn('role_id', [$financial_institution_id, $merchant_id, $consumer_id])
                       ->select('id', 'name', 'role_id', 'is_eula_checked')
                       ->get();
        return view('admin.eula.index', compact('general_setting', 'admins'));
    }







// ************************
    // document management
// ************************


    public function documents()
    {
        $documents = Document::with('role')->orderBy('created_at', 'desc')->get();
        $roles = Role::all();
        return view('admin.documents.index', compact('documents', 'roles'));
    }

    public function documents_store(Request $request)
    {
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'role_id' => 'required|exists:roles,id',
                'file_path' => 'required|mimes:pdf|max:10240', // 10MB max
            ]);

            if ($request->hasFile('file_path')) {
                // Get the file
                $file = $request->file('file_path');
                $ext = $file->getClientOriginalExtension();
                
                // Create unique filename
                $final_name = 'document_' . time() . '.' . $ext;
                
                // Move file to public/uploads directory
                $file->move(public_path('uploads/'), $final_name);

                Document::create([
                    'document_name' => $request->document_name,
                    'role_id' => $request->role_id,
                    'file_path' => $final_name
                ]);

                return redirect()->back()->with('success', 'Document uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No file was uploaded.');
        } catch (\Exception $e) {
            \Log::error('Document Upload Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error uploading document: ' . $e->getMessage());
        }
    }




    public function documents_edit($id)
    {
        $document = Document::findOrFail($id);
        $roles = Role::all();
        return view('admin.documents.edit', compact('document', 'roles'));
    }

    public function documents_update(Request $request, $id)
    {
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'role_id' => 'required|exists:roles,id',
                'file_path' => 'nullable|mimes:pdf|max:10240', // 10MB max
            ]);

            $document = Document::findOrFail($id);

            $data = [
                'document_name' => $request->document_name,
                'role_id' => $request->role_id,
            ];

            if ($request->hasFile('file_path')) {
                $old_file_path = public_path('uploads/' . $document->file_path);
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }

                // Upload new file
                $file = $request->file('file_path');
                $ext = $file->getClientOriginalExtension();
                $final_name = 'document_' . time() . '.' . $ext;
                
                // Move file to public/uploads directory
                $file->move(public_path('uploads/'), $final_name);
                $data['file_path'] = $final_name;
            }

            $document->update($data);

            return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Document Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating document: ' . $e->getMessage());
        }
    }


    public function documents_destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            
            // Delete file from public/uploads if exists
            $file_path = public_path($document->file_path);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            $document->delete();
            
            return redirect()->back()->with('success', 'Document deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Document Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting document: ' . $e->getMessage());
        }
    }







// ... existing code ...

public function my_documents()
{
    $admin_id = session('id');

    if (empty($admin_id)) {
        return redirect()->back()->with('error', 'Session expired. Please login again.');
    }
    
    $admin = Admin::find($admin_id);
    if (!$admin) {
        return redirect()->back()->with('error', 'User not found');
    }
    if ($admin->role_id == 1) {
        return redirect()->back()->with('error', 'Access denied');
    }
    
    $documents = Document::where('role_id', $admin->role_id)
                        ->with('role')
                        ->orderBy('created_at', 'desc')
                        ->get();
    
    return view('admin.user_documents.index', compact('documents'));
}







}


