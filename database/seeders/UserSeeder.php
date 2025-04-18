<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'email' => 'user@email.com',
                'password' => Hash::make(1),
                'role' => USER,
                'name' => 'Raihan'
            ],

            [
                'email' => 'admin@email.com',
                'password' => Hash::make(1),
                'role' => ADMIN,
                'name' => 'Raihan'
            ]
        ];

        foreach ($users as $user){
            User::firstOrCreate(
                ['email' => $user['email']],
        [
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'name' => $user['name']
                ]
            );
        }
        
    }
}
