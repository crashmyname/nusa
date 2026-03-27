<?php

namespace App\Modules\Integration\Payment\Repositories;

use App\Core\BaseRepository;
use App\Modules\Integration\Payment\Models\Payment;

class PaymentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Payment();
    }
}
