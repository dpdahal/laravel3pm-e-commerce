<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin002'),
                'gender' => 'male',
                'role' => 'admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user002'),
                'gender' => 'male',
                'role' => 'user'
            ]
        ];

        foreach ($usersData as $user){
            if (!User::where('email', $user['email'])->exists()){
                User::create($user);
            }

        }
    }
}
