<?php

use App\Helpers\Route;
use App\Modules\Support\Notification\Controllers\NotificationController;

Route::group('/notification', function() {
    Route::get('', [NotificationController::class, 'index']);
});
