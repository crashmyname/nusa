<?php

use App\Helpers\Route;
use App\Modules\SupplyChain\Purchase\Controllers\PurchaseController;

Route::group('/purchase', function() {
    Route::get('', [PurchaseController::class, 'index']);
});
