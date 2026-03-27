<?php

namespace App\Modules\Core\IAM\Repositories;

use App\Core\BaseRepository;
use App\Modules\Core\IAM\Models\IAM;

class IAMRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new IAM();
    }
}
