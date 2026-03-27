<?php

namespace App\Modules\Support\Notification\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Notification\Models\Notification;

class NotificationRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Notification();
    }
}
