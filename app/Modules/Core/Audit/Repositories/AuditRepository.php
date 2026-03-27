<?php

namespace App\Modules\Core\Audit\Repositories;

use App\Core\BaseRepository;
use App\Modules\Core\Audit\Models\Audit;

class AuditRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Audit();
    }
}
