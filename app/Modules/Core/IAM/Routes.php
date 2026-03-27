<?php

use App\Helpers\Route;
use App\Modules\Core\IAM\Controllers\IAMController;

Route::group('/iam', function() {
    Route::get('', [IAMController::class, 'index']);
});
