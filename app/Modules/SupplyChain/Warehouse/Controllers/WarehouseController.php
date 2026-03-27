<?php

namespace App\Modules\SupplyChain\Warehouse\Controllers;

use App\Core\Controller;

class WarehouseController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Warehouse']);
    }
}
