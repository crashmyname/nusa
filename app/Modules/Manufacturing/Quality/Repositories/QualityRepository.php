<?php

namespace App\Modules\Manufacturing\Quality\Repositories;

use App\Core\BaseRepository;
use App\Modules\Manufacturing\Quality\Models\Quality;

class QualityRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Quality();
    }
}
