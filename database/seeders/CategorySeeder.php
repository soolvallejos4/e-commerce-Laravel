<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'name' => 'Vestimenta',
                'description' => 'En esta sección encontrarás toda la vestimenta para yoga.'
            ],
            [
                'category_id' => 2,
                'name' => 'Accesorios',
                'description' => 'En esta sección encontrarás todos los accesorios para tus prácticas de yoga.'
            ],

        ]);
    }
}
