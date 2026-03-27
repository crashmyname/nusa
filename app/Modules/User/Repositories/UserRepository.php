<?php

namespace App\Modules\User\Repositories;

use App\Core\BaseRepository;
use App\Modules\User\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new User();
    }
}
