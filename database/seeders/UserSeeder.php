<?php
namespace Database\Seeders;

use App\Core\Seeder;
use App\Modules\User\Models\User;
use Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    public function run()
    {
        UserFactory::make(100);
    }
}