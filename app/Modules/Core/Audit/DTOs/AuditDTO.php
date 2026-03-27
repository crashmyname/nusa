<?php

namespace App\Modules\Core\Audit\DTOs;

class AuditDTO
{
    public function __construct(
        public $data = []
    ) {}
}
