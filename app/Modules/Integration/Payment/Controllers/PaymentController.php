<?php

namespace App\Modules\Integration\Payment\Controllers;

use App\Core\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Payment']);
    }
}
