<?php

namespace App\Modules\Finance\Asset\Repositories;

use App\Core\BaseRepository;
use App\Modules\Finance\Asset\Models\Asset;

class AssetRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Asset();
    }
}
