<?php

namespace App\Modules\SupplyChain\Inventory\Controllers;

use App\Core\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Inventory']);
    }
}
