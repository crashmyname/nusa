<?php

use App\Helpers\Route;
use App\Modules\Sales\CRM\Controllers\CRMController;

Route::group('/crm', function() {
    Route::get('', [CRMController::class, 'index']);
});
