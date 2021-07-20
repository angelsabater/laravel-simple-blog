<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ['name'      => 'user1',
            'email'      => 'user1@test.com',
            'username'   => 'user1',
            'role_id'    => 2,
            'password'   => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'      => 'user2',
            'email'      => 'user2@test.com',
            'username'   => 'user2',
            'role_id'    => 2,
            'password'   => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
    
        User::insert($user);
    }
}
