<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['role'      => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['role'      => 'user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
    
        Role::insert($roles);
    }
}
