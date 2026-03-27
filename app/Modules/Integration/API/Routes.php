<?php

use App\Helpers\Route;
use App\Modules\Integration\API\Controllers\APIController;

Route::group('/api', function() {
    Route::get('', [APIController::class, 'index']);
});
