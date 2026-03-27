<?php

namespace App\Modules\Sales\CRM\Controllers;

use App\Core\Controller;

class CRMController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'CRM']);
    }
}
