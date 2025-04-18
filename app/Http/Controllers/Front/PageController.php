<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Plan;
use App\Models\Transaction;

class PageController extends Controller
{
    public function detail($slug)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $dynamic_page_detail = DB::table('dynamic_pages')->where('dynamic_page_slug', $slug)->first();
        if(!$dynamic_page_detail) {
            return abort(404);
        }

        $plan = '';
        if($slug == 'prices'){

            $plan = Plan::where('status',1)->get();
        }
        return view('pages.dynamic_page', compact('g_setting','dynamic_page_detail','slug','plan'));
    }

    public function payamentDone(){

        $admin_id =  session('id');
        $date = date('Y-m-d');

        $transaction = Transaction::where('admin_id',$admin_id)->where('date',$date)->latest()->first();
        $transaction->status = 1;
        $transaction->save();

        return redirect('page/prices')->with('success','Payment successfully done!');


    }
}
