<?php

use App\Helpers\Route;
use App\Modules\SupplyChain\Warehouse\Controllers\WarehouseController;

Route::group('/warehouse', function() {
    Route::get('', [WarehouseController::class, 'index']);
});
