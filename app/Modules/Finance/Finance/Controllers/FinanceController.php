<?php

namespace App\Modules\Finance\Finance\Controllers;

use App\Core\Controller;

class FinanceController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Finance']);
    }
}
