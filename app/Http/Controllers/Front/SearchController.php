<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() == 'GET') {
            return abort(404);
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $search_string = $request->search_string;
        $search_string_filter = '%' . $search_string . '%';

        $blog_items = DB::table('blogs')->orderby('id', 'desc')->where('blog_title', 'like', $search_string_filter)->orWhere('blog_content', 'like', $search_string_filter)->get();
        $blog_items_no_pagi = DB::table('blogs')->orderby('id', 'desc')->get();
        $categories = DB::table('categories')->get();

        return view('pages.search_result', compact('g_setting', 'search_string', 'categories', 'blog_items_no_pagi', 'blog_items'));
    }

    public function getAddress(Request $request)
    {
        $response = Http::get('https://us-autocomplete-pro.api.smartystreets.com/lookup', [
            'search' => $request->search,
            'prefer_geolocation' => $request->prefer_geolocation,
            'max_results' => $request->max_results,
            'auth-id' => '58f795c8-cc91-7533-d17f-80d4fe1a4ae6',
            'auth-token' => 'bIf063W3vT4k7gho20b6'
        ]);

        return response($response->body());
    }
    public function getAddressDetail(Request $request)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
        ])->post('https://us-street.api.smarty.com/street-address?auth-id=55ca3359-65ee-9bf0-e4b4-400935bcdeea&auth-token=FNqnu197qV3daIKBTXUM', [
            [
                'street' => $request->street,
                'city' => $request->city,
                'state' =>$request->state,
                'zipcode' =>$request->zipcode,
                'candidates' => 10,
            ]
        ]);
        return response()->json($response->json());
    }
}
