<?php

use App\Helpers\Route;
use App\Modules\Finance\Budget\Controllers\BudgetController;

Route::group('/budget', function() {
    Route::get('', [BudgetController::class, 'index']);
});
