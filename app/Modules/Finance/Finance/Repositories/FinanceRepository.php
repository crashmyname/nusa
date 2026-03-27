<?php

namespace App\Modules\Finance\Finance\Repositories;

use App\Core\BaseRepository;
use App\Modules\Finance\Finance\Models\Finance;

class FinanceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Finance();
    }
}
