<?php

namespace App\Modules\Support\Project\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Project\Models\Project;

class ProjectRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Project();
    }
}
