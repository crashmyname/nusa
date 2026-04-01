<?php

use App\Middlewares\JwtMiddleware;

return [
    'auth' => JwtMiddleware::class,
];