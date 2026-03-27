<?php

namespace App\Modules\Core\Organization\Repositories;

use App\Core\BaseRepository;
use App\Modules\Core\Organization\Models\Organization;

class OrganizationRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Organization();
    }
}
