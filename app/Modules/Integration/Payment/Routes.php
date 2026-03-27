<?php

use App\Helpers\Route;
use App\Modules\Integration\Payment\Controllers\PaymentController;

Route::group('/payment', function() {
    Route::get('', [PaymentController::class, 'index']);
});
