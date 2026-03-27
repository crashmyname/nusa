<?php

namespace App\Modules\Integration\Ecommerce\Repositories;

use App\Core\BaseRepository;
use App\Modules\Integration\Ecommerce\Models\Ecommerce;

class EcommerceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Ecommerce();
    }
}
