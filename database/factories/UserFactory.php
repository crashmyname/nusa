<?php
namespace Database\Factories;

use App\Modules\User\Models\User;

class UserFactory
{
    public static function make($count = 1)
    {
        for ($i = 0; $i < $count; $i++) {
            User::create([
                'name' => 'User '.$i,
                'email' => "user$i@mail.com"
            ]);
        }
    }
}