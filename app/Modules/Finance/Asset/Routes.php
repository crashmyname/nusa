<?php

use App\Helpers\Route;
use App\Modules\Finance\Asset\Controllers\AssetController;

Route::group('/asset', function() {
    Route::get('', [AssetController::class, 'index']);
});
