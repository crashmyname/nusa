<?php

namespace App\Modules\Support\Notification\Controllers;

use App\Core\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Notification']);
    }
}
