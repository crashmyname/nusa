<?php

namespace App\Modules\Analytics\BI\Controllers;

use App\Core\Controller;

class BIController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'BI']);
    }
}
