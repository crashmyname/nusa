<?php

namespace App\Modules\Finance\Budget\Repositories;

use App\Core\BaseRepository;
use App\Modules\Finance\Budget\Models\Budget;

class BudgetRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Budget();
    }
}
