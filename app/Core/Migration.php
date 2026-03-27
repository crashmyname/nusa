<?php
namespace App\Core;

use Illuminate\Database\Capsule\Manager as DB;

abstract class Migration
{
    abstract public function up();
    abstract public function down();

    protected function schema()
    {
        return DB::schema();
    }
}