<?php

namespace App\Modules\User\Repositories;

use App\Core\BaseRepository;
use App\Core\Cache;
use App\Modules\User\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAllUsers()
    {
        return Cache::remember('users:list', 60, function () {
            return $this->model
                ->select('user_id','name','email','password')
                ->limit(50)
                ->get()
                ->toArray();
        });
    }
}
