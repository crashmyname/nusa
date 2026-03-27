<?php

namespace App\Modules\Support\Workflow\Controllers;

use App\Core\Controller;

class WorkflowController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Workflow']);
    }
}
