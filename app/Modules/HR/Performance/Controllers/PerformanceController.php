<?php

namespace App\Modules\HR\Performance\Controllers;

use App\Core\Controller;

class PerformanceController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Performance']);
    }
}
