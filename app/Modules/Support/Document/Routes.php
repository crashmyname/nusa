<?php

use App\Helpers\Route;
use App\Modules\Support\Document\Controllers\DocumentController;

Route::group('/document', function() {
    Route::get('', [DocumentController::class, 'index']);
});
