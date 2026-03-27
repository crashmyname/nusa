<?php

namespace App\Modules\SupplyChain\Warehouse\Repositories;

use App\Core\BaseRepository;
use App\Modules\SupplyChain\Warehouse\Models\Warehouse;

class WarehouseRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Warehouse();
    }
}
