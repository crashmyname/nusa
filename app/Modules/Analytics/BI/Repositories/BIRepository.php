<?php

namespace App\Modules\Analytics\BI\Repositories;

use App\Core\BaseRepository;
use App\Modules\Analytics\BI\Models\BI;

class BIRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new BI();
    }
}
