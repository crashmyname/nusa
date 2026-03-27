<?php

use App\Helpers\Route;
use App\Modules\SupplyChain\Inventory\Controllers\InventoryController;

Route::group('/inventory', function() {
    Route::get('', [InventoryController::class, 'index']);
});
