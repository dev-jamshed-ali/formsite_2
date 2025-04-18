<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Admin\GeneralSetting;
use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'sliders' => DB::table('sliders')->get(),
            'page_home' => DB::table('page_home_items')->where('id', 1)->first(),
            'why_choose_items' => DB::table('why_choose_items')->get(),
            'services' => DB::table('services')->get(),
            'testimonials' => DB::table('testimonials')->get(),
            'projects' => DB::table('projects')->get(),
            'team_members' => DB::table('team_members')->get(),
            'blogs' => DB::table('blogs')->get(),
            'general_setting' => GeneralSetting::select('video')->where('id', 1)->first()
        ];

        if (!auth()->user()) {
            session()->forget('_token');
            session()->flush();
        }

        return view('pages.index', $data);
    }
}