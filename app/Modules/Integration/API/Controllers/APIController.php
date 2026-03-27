<?php

namespace App\Modules\Integration\API\Controllers;

use App\Core\Controller;

class APIController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'API']);
    }
}
