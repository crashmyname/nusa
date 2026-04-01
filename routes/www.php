<?php

use App\Helpers\Route;
use App\Middlewares\JwtMiddleware;
use App\Middlewares\AuthMiddleware;
use App\Modules\User\Controllers\UserController;

// Route::middleware([AuthMiddleware::class])->group(function(){})
// Route::get('/', function() {
//     return response()->json("HELLO ERP");
// });
// Route::get('/users', [UserController::class, 'index']);