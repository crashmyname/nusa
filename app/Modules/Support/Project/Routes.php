<?php

use App\Helpers\Route;
use App\Modules\Support\Project\Controllers\ProjectController;

Route::group('/project', function() {
    Route::get('', [ProjectController::class, 'index']);
});
