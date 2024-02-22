<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_id' => 1,
                'category_id' => 2,
                'title' => 'Colchoneta',
                'description' => 'Material: PVC alta densidad. Libre de látex y componentes tóxicos. No daña ni irrita la piel.
            Antideslizante de gran adherencia a la superficie.
            Medidas: 183,5 cm largo x 61,5 cm ancho',
                'type_yoga' => 'Classic Yoga',
                'price' => 2500,
                'cover' => '20230619002416_colchoneta.png',
                'cover_description' => 'colchoneta-yoga',
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'product_id' => 2,
                'category_id' => 2,
                'title' => 'Almohadilla',
                'description' => 'Características
               Altura: 15 cm
               Diámetro: 40 cm
               Materiales de la funda: Lavable
               Incluye relleno: Sí
               Cantidad de zafus: 1',
                'type_yoga' => 'Classic Yoga',
                'price' => 2100,
                'cover' => '20230619002541_almohadilla.jpg',
                'cover_description' => '20230619002541_almohadilla.jpg',
                'created_at' => now(),
                'updated_at' => now()

            ],
        ]);


        //Carga de la relacion muchos a muchos.

        DB::table('products_has_tags')->insert([
            [
                'product_id' => 1,
                'tag_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'tag_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'tag_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'tag_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
