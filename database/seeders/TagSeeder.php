<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert(
            [
                [
                    'tag_id' => 1,
                    'name' => 'Nuevo',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tag_id' => 2,
                    'name' => 'Envío gratis',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tag_id' => 3,
                    'name' => 'Edición especial',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tag_id' => 4,
                    'name' => 'Producto Limitado',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]

        );
    }
}
