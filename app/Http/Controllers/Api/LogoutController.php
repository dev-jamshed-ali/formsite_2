<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use Illuminate\Support\Facades\Hash; 

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('role');
        session()->forget('id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('photo'); 
        return response()->json(['success' => __('Logout successfully.')], 200);	
    }
}
