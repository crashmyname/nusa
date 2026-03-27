<?php

use App\Helpers\Route;
use App\Modules\Sales\Sales\Controllers\SalesController;

Route::group('/sales', function() {
    Route::get('', [SalesController::class, 'index']);
});
