<?php

use App\Helpers\Route;
use App\Modules\Core\MasterData\Controllers\MasterDataController;

Route::group('/masterdata', function() {
    Route::get('', [MasterDataController::class, 'index']);
});
