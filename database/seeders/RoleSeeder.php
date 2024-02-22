<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'name' => 'admin'
            ],
            [
                'role_id' => 2,
                'name' => 'user'
            ],

        ]);
    }
}
