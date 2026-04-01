<?php
namespace App\Middlewares;

use App\Core\Auth;
use App\Modules\User\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
            return response()->json(['error' => 'Invalid token format'], 401);
        }

        $token = $matches[1];

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            $user = User::find($decoded->sub);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 401);
            }

            Auth::setUser($user);

            $request['user'] = $user;

            return $next($request);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Invalid token',
                'message' => $e->getMessage()
            ], 401);
        }
    }
}