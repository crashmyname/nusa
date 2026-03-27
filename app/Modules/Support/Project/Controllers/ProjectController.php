<?php

namespace App\Modules\Support\Project\Controllers;

use App\Core\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Project']);
    }
}
