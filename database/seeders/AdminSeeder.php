<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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
            ['name'      => 'admin',
            'email'      => 'admin@test.com',
            'username'   => 'admin',
            'role_id'    => 1,
            'password'   => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'      => 'admin2',
            'email'      => 'admin2@test.com',
            'username'   => 'admin2',
            'role_id'    => 1,
            'password'   => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
    
        User::insert($admin);
    }
}
