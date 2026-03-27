<?php

use App\Helpers\Route;
use App\Modules\Support\Maintenance\Controllers\MaintenanceController;

Route::group('/maintenance', function() {
    Route::get('', [MaintenanceController::class, 'index']);
});
