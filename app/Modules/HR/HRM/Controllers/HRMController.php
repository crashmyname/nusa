<?php

namespace App\Modules\HR\HRM\Controllers;

use App\Core\Controller;

class HRMController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'HRM']);
    }
}
