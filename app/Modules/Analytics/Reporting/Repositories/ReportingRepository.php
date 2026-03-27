<?php

namespace App\Modules\Analytics\Reporting\Repositories;

use App\Core\BaseRepository;
use App\Modules\Analytics\Reporting\Models\Reporting;

class ReportingRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Reporting();
    }
}
