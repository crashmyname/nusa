<?php

use App\Helpers\Route;
use App\Modules\HR\Performance\Controllers\PerformanceController;

Route::group('/performance', function() {
    Route::get('', [PerformanceController::class, 'index']);
});
