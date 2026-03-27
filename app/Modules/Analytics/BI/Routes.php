<?php

use App\Helpers\Route;
use App\Modules\Analytics\BI\Controllers\BIController;

Route::group('/bi', function() {
    Route::get('', [BIController::class, 'index']);
});
