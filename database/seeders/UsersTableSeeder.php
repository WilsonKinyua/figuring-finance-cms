<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'              => 'Wilson Admin',
                'email'             => env('ADMIN_EMAIL'),
                'password'          => bcrypt(env('ADMIN_PASSWORD')),
                'remember_token'    => null,
                'email_verified_at' => now(),
                'is_approved'       => true,
                'locale'            => '',
            ],
        ];

        User::insert($users);
    }
}
