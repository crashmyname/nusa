<?php

use App\Helpers\Route;
use App\Modules\Support\Workflow\Controllers\WorkflowController;

Route::group('/workflow', function() {
    Route::get('', [WorkflowController::class, 'index']);
});
