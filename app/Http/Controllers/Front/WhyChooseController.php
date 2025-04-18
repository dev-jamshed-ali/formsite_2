<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhyChooseController extends Controller
{
    

    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $why_choose_detail = DB::table('why_choose_items')->where('slug', $slug)->first();
        $why_choose_items = DB::table('why_choose_items')->get();
        if(!$why_choose_detail) {
            return abort(404);
        }
        return view('pages.why_choose_detail', compact('g_setting','why_choose_detail','why_choose_items'));
    }
}
