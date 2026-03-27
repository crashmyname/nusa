<?php

namespace App\Modules\Support\Workflow\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Workflow\Models\Workflow;

class WorkflowRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Workflow();
    }
}
