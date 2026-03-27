<?php

namespace App\Modules\Manufacturing\Production\Repositories;

use App\Core\BaseRepository;
use App\Modules\Manufacturing\Production\Models\Production;

class ProductionRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Production();
    }
}
