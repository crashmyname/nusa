<?php

namespace App\Modules\Finance\Asset\Controllers;

use App\Core\Controller;

class AssetController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Asset']);
    }
}
