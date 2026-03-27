<?php

namespace App\Modules\Core\Audit\Controllers;

use App\Core\Controller;

class AuditController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Audit']);
    }
}
