<?php

namespace App\Modules\HR\Recruitment\Controllers;

use App\Core\Controller;

class RecruitmentController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Recruitment']);
    }
}
