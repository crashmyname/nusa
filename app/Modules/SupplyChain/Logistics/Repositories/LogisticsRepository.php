<?php

namespace App\Modules\SupplyChain\Logistics\Repositories;

use App\Core\BaseRepository;
use App\Modules\SupplyChain\Logistics\Models\Logistics;

class LogisticsRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Logistics();
    }
}
