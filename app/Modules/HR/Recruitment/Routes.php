<?php

use App\Helpers\Route;
use App\Modules\HR\Recruitment\Controllers\RecruitmentController;

Route::group('/recruitment', function() {
    Route::get('', [RecruitmentController::class, 'index']);
});
