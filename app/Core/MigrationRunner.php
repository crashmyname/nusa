<?php
namespace App\Core;

class MigrationRunner
{
    protected $path = __DIR__ . '/../../database/migrations';

    public function run()
    {
        $files = glob($this->path . '/*.php');
        sort($files);

        foreach ($files as $file) {

            echo "Running: " . basename($file) . PHP_EOL;

            try {
                $migration = require $file;

                if (!is_object($migration)) {
                    throw new \Exception("Migration is not object");
                }

                $migration->up();

                echo "Migrated: " . basename($file) . PHP_EOL;

            } catch (\Throwable $e) {
                echo "ERROR in " . basename($file) . PHP_EOL;
                echo $e->getMessage() . PHP_EOL;

                break;
            }
        }
    }
}