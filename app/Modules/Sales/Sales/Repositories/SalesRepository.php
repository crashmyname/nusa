<?php

namespace App\Modules\Sales\Sales\Repositories;

use App\Core\BaseRepository;
use App\Modules\Sales\Sales\Models\Sales;

class SalesRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Sales();
    }
}
