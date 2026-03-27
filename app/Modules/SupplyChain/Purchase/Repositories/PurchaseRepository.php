<?php

namespace App\Modules\SupplyChain\Purchase\Repositories;

use App\Core\BaseRepository;
use App\Modules\SupplyChain\Purchase\Models\Purchase;

class PurchaseRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Purchase();
    }
}
