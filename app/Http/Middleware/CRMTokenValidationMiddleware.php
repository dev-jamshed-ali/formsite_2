<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CRMTokenValidationMiddleware
{
    public function handle(Request $request, Closure $next)
    {       
        // Check for the Bearer token in the Authorization header
        $authHeader = $request->header('Authorization');
        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $customToken = $matches[1];

        // Verify the JWT token
        try {
            $decodedToken = JWT::decode($customToken, new Key('sterlingsTech', 'HS256'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token', 'message' => $e->getMessage()], 401);
        }

        // Optionally, you can attach the decoded token to the request for further use
        $request->attributes->add(['decodedToken' => $decodedToken]);

        return $next($request);
    }
}
