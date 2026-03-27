<?php

namespace App\Modules\Core\MasterData\Repositories;

use App\Core\BaseRepository;
use App\Modules\Core\MasterData\Models\MasterData;

class MasterDataRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new MasterData();
    }
}
