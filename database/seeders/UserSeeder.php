<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'role_id' => 2,
                'email' => 'sol.vallejos@davinci.edu.ar',
                'password' => Hash::make('calles123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'user_id' => 2,
                'role_id' => 1,
                'email' => 'sol.vallejos@hotmail.com',
                'password' => Hash::make('calles1234'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
        ]);

        DB::table('users_has_products')->insert([
            [
                'user_id' => 2,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
