<?php

use App\Helpers\Route;
use App\Modules\Core\Organization\Controllers\OrganizationController;

Route::group('/organization', function() {
    Route::get('', [OrganizationController::class, 'index']);
});
