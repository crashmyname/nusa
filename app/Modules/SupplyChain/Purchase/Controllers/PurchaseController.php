<?php

namespace App\Modules\SupplyChain\Purchase\Controllers;

use App\Core\Controller;

class PurchaseController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Purchase']);
    }
}
