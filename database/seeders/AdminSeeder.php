<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            ['name' => 'admin',
            'email' => 'admin@test.com',
            'username' => 'admin',
            'role_id' => 1,
            'password' => Hash::make('password')],
        ];
    
        User::insert($admin);
    }
}
