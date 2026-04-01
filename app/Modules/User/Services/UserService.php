<?php

namespace App\Modules\User\Services;

use App\Modules\User\Repositories\UserRepository;

class UserService
{
    //
    public function __construct(protected UserRepository $userRepository){}
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
}
