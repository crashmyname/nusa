<?php

namespace App\Modules\Finance\Accounting\Repositories;

use App\Core\BaseRepository;
use App\Modules\Finance\Accounting\Models\Accounting;

class AccountingRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Accounting();
    }
}
