<?php

namespace App\Modules\HR\Performance\Repositories;

use App\Core\BaseRepository;
use App\Modules\HR\Performance\Models\Performance;

class PerformanceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Performance();
    }
}
