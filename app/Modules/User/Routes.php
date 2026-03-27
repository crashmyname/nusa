<?php

use App\Helpers\Route;
use App\Modules\User\Controllers\UserController;

Route::group('/user', function() {
    Route::get('', [UserController::class, 'index']);
});
