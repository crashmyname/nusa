<?php

namespace App\Modules\Support\Document\Repositories;

use App\Core\BaseRepository;
use App\Modules\Support\Document\Models\Document;

class DocumentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Document();
    }
}
