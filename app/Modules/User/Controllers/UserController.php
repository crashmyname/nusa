<?php

namespace App\Modules\User\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'User']);
    }
}
