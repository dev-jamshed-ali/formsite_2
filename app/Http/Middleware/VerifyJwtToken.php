<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Response;

class VerifyJwtToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken(); 

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
        }
        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET','sterlingsTech'), 'HS256')); 
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token is invalid or expired'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
