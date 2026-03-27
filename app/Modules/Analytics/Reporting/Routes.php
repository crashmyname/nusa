<?php

use App\Helpers\Route;
use App\Modules\Analytics\Reporting\Controllers\ReportingController;

Route::group('/reporting', function() {
    Route::get('', [ReportingController::class, 'index']);
});
