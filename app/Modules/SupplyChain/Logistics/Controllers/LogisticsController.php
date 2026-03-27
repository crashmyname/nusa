<?php

namespace App\Modules\SupplyChain\Logistics\Controllers;

use App\Core\Controller;

class LogisticsController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Logistics']);
    }
}
