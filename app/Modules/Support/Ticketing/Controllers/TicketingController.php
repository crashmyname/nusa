<?php

namespace App\Modules\Support\Ticketing\Controllers;

use App\Core\Controller;

class TicketingController extends Controller
{
    public function index()
    {
        return response()->json(['module' => 'Ticketing']);
    }
}
