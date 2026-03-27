<?php
namespace Database\Seeders;

use App\Core\Seeder;
use Database\Seeders\UserSeeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        (new UserSeeder())->run();
    }
}