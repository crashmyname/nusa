<?php

namespace App\Modules\Core\Organization\Controllers;

use App\Core\Controller;

class OrganizationController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Organization']);
    }
}
