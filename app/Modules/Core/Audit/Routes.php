<?php

use App\Helpers\Route;
use App\Modules\Core\Audit\Controllers\AuditController;

Route::group('/audit', function() {
    Route::get('', [AuditController::class, 'index']);
});
