<?php

namespace App\Modules\Finance\Budget\Controllers;

use App\Core\Controller;

class BudgetController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Budget']);
    }
}
