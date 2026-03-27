<?php

use App\Helpers\Route;
use App\Modules\Finance\Accounting\Controllers\AccountingController;

Route::group('/accounting', function() {
    Route::get('', [AccountingController::class, 'index']);
});
