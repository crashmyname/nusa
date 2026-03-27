<?php
namespace App\Core;

class MigrationRunner
{
    protected $path = __DIR__ . '/../../database/migrations';

    public function run()
    {
        foreach (glob($this->path . '/*.php') as $file) {
            $migration = require $file;
            $migration->up();

            echo "Migrated: " . basename($file) . PHP_EOL;
        }
    }
}