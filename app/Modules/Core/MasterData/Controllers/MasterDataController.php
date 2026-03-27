<?php

namespace App\Modules\Core\MasterData\Controllers;

use App\Core\Controller;

class MasterDataController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'MasterData']);
    }
}
