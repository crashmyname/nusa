<?php
namespace App\Middlewares;

use App\Core\Auth;
use App\Modules\User\Models\User;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        $token = null;

        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
        }

        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Auth::setUser($user);

        return $next($request);
    }
}