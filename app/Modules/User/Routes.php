<?php

use App\Helpers\Route;
use App\Modules\User\Controllers\UserController;

Route::group('/api/user', function($router) {
    $router->get('', [UserController::class, 'index']);
});