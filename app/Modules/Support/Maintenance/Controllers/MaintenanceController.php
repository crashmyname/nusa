<?php

namespace App\Modules\Support\Maintenance\Controllers;

use App\Core\Controller;

class MaintenanceController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Maintenance']);
    }
}
