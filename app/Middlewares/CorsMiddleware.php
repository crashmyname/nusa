<?php
namespace App\Middlewares;

use App\Core\Config;

class CorsMiddleware
{
    public function handle($request, $next)
    {
        $cors = Config::get('cors');

        header("Access-Control-Allow-Origin: " . implode(',', $cors['allowed_origins']));
        header("Access-Control-Allow-Methods: " . implode(',', $cors['allowed_methods']));
        header("Access-Control-Allow-Headers: " . implode(',', $cors['allowed_headers']));

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }

        return $next($request);
    }
}