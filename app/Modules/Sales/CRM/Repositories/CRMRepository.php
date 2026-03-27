<?php

namespace App\Modules\Sales\CRM\Repositories;

use App\Core\BaseRepository;
use App\Modules\Sales\CRM\Models\CRM;

class CRMRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new CRM();
    }
}
