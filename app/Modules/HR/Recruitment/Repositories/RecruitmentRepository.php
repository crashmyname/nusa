<?php

namespace App\Modules\HR\Recruitment\Repositories;

use App\Core\BaseRepository;
use App\Modules\HR\Recruitment\Models\Recruitment;

class RecruitmentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Recruitment();
    }
}
