<?php

use App\Helpers\Route;
use App\Modules\Integration\Ecommerce\Controllers\EcommerceController;

Route::group('/ecommerce', function() {
    Route::get('', [EcommerceController::class, 'index']);
});
