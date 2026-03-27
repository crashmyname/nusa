<?php

namespace App\Modules\HR\HRM\Repositories;

use App\Core\BaseRepository;
use App\Modules\HR\HRM\Models\HRM;

class HRMRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new HRM();
    }
}
