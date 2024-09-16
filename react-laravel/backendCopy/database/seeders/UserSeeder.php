<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
        ]);

        // You can add more test users if needed
    }
}
