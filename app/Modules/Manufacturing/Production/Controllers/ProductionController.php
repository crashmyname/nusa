<?php

namespace App\Modules\Manufacturing\Production\Controllers;

use App\Core\Controller;

class ProductionController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Production']);
    }
}
