<?php

namespace App\Modules\User\Controllers;

use App\Core\Controller;
use App\Modules\User\Services\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $userService){}
    public function index()
    {
        $service = $this->userService->getAllUsers();
        return response()->json(
            [
                'module' => 'User',
                'data' => $service
            ]
            );
    }
}
