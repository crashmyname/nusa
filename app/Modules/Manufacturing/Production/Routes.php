<?php

use App\Helpers\Route;
use App\Modules\Manufacturing\Production\Controllers\ProductionController;

Route::group('/production', function() {
    Route::get('', [ProductionController::class, 'index']);
});
