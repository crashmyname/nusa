<?php

namespace App\Modules\Integration\API\Repositories;

use App\Core\BaseRepository;
use App\Modules\Integration\API\Models\API;

class APIRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new API();
    }
}
