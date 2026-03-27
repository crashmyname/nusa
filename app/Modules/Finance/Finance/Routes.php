<?php

use App\Helpers\Route;
use App\Modules\Finance\Finance\Controllers\FinanceController;

Route::group('/finance', function() {
    Route::get('', [FinanceController::class, 'index']);
});
