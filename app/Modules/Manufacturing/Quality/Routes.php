<?php

use App\Helpers\Route;
use App\Modules\Manufacturing\Quality\Controllers\QualityController;

Route::group('/quality', function() {
    Route::get('', [QualityController::class, 'index']);
});
