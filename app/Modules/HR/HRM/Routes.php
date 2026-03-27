<?php

use App\Helpers\Route;
use App\Modules\HR\HRM\Controllers\HRMController;

Route::group('/hrm', function() {
    Route::get('', [HRMController::class, 'index']);
});
