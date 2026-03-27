<?php

namespace App\Modules\Sales\Sales\Controllers;

use App\Core\Controller;

class SalesController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Sales']);
    }
}
