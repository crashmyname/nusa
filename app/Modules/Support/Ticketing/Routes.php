<?php

use App\Helpers\Route;
use App\Modules\Support\Ticketing\Controllers\TicketingController;

Route::group('/ticketing', function() {
    Route::get('', [TicketingController::class, 'index']);
});
