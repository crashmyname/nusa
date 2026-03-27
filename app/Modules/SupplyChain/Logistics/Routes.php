<?php

use App\Helpers\Route;
use App\Modules\SupplyChain\Logistics\Controllers\LogisticsController;

Route::group('/logistics', function() {
    Route::get('', [LogisticsController::class, 'index']);
});
