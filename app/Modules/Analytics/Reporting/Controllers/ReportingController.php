<?php

namespace App\Modules\Analytics\Reporting\Controllers;

use App\Core\Controller;

class ReportingController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Reporting']);
    }
}
