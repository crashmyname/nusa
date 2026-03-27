<?php

namespace App\Modules\Integration\Ecommerce\Controllers;

use App\Core\Controller;

class EcommerceController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Ecommerce']);
    }
}
