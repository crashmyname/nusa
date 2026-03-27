<?php

namespace App\Modules\Core\System\Repositories;

use App\Core\BaseRepository;
use App\Modules\Core\System\Models\System;

class SystemRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new System();
    }
}
