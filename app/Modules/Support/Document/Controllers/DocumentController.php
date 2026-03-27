<?php

namespace App\Modules\Support\Document\Controllers;

use App\Core\Controller;

class DocumentController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Document']);
    }
}
