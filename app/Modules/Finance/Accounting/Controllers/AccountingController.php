<?php

namespace App\Modules\Finance\Accounting\Controllers;

use App\Core\Controller;

class AccountingController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Accounting']);
    }
}
