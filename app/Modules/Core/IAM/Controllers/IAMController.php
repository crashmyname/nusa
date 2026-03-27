<?php

namespace App\Modules\Core\IAM\Controllers;

use App\Core\Controller;

class IAMController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'IAM']);
    }
}
