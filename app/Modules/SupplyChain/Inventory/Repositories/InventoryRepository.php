<?php

namespace App\Modules\SupplyChain\Inventory\Repositories;

use App\Core\BaseRepository;
use App\Modules\SupplyChain\Inventory\Models\Inventory;

class InventoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Inventory();
    }
}
