<?php

namespace App\Modules\Support\Ticketing\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Ticketing\Models\Ticketing;

class TicketingRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Ticketing();
    }
}
