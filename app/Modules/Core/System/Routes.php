<?php

use App\Helpers\Route;
use App\Modules\Core\System\Controllers\SystemController;

Route::group('/system', function() {
    Route::get('', [SystemController::class, 'index']);
});
