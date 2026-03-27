<?php

namespace App\Modules\Manufacturing\Quality\Controllers;

use App\Core\Controller;

class QualityController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Quality']);
    }
}
