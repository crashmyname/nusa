<?php

namespace App\Modules\Support\Maintenance\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Maintenance\Models\Maintenance;

class MaintenanceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Maintenance();
    }
}
