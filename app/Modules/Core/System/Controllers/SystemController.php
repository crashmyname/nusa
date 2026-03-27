<?php

namespace App\Modules\Core\System\Controllers;

use App\Core\Controller;

class SystemController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'System']);
    }
}
