<?php
namespace App\Http\Middleware;
use App\Models\Admin\Admin;

use Closure;
use Illuminate\Http\Request;

class ApiTokenValidationMiddleware
{
    public function handle(Request $request, Closure $next)
    {       
        $token = $request->header('token');
        $customToken = Admin::where('token', $token)->first();
        if (!$customToken) {
            return response()->json(['error' => 'Invalid token'], 401);
        }
        return $next($request);
    }
}

