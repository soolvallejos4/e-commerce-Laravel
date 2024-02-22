<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductsAdminAPITest extends TestCase
{
    use RefreshDatabase;
    protected bool $seed = true;

    public function asAdmin(): self
    {
        $admin = new User();
        $admin->user_admin = 2;
        $admin->user_role = 1;
        return $this->actingAs($admin);
    }

    public function test_making_a_get_request_to_the_products_api_root_returns_all_the_products(): void
    {

      $response = $this->asAdmin()->getJson('/api/products');

        //Si quiero ver el contenido completo de lo que la peticion obtuvo, incluyendo datos de la propia peticion, uso el metodo dump().
  /*          $response->dump(); */


        //Estructura de los productos como un JSON.
        /*
            {
                status:0, //tod ok
                data: {
                    {
                        product_id: 1,
                        title: 'calza yoga'
                    }
                }
            }

        */

        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    //Indico que sea un array de objetos.
                    '*' => [

                        'product_id',
                        'category_id',
                        'title',
                        'description',
                        'type_yoga',
                        'price',
                        'cover',
                        'cover_description',
                        'created_at',
                        'updated_at',

                    ]
                ]
            ]);
    }

    public function test_making_a_get_request_to_the_products_api_root_without_being_authenticated_returns_401() 
    {
        $response = $this->getJson('/api/products');

        $response->assertStatus(401);
    }



    //Traigo un producto particular.
    public function test_making_a_get_request_to_products_with_an_id_returns_the_requested_product()
    {

        $id = 1;
        $response = $this->asAdmin()->getJson('/api/products/' . $id);

        $response
            ->assertStatus(200)
            //Fluent Json Testing.
            ->assertJson(
                fn (AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.product_id', $id)
                    // Indicamos los tipos de dato que deben tener las otras propiedades.
                    ->whereAllType([
                        'status' => 'integer',
                        'data.product_id' => 'integer',
                        'data.category_id' => 'integer',
                        'data.title' => 'string',
                        'data.description' => 'string',
                        'data.type_yoga' => 'string',
                        'data.price' => 'integer|double',
                        'data.cover' => 'string|null',
                        'data.cover_description' => 'string|null',
                        'data.created_at' => 'string',
                        'data.updated_at' => 'string'
                    ])
            );;
    }

    public function test_making_a_get_request_to_products_with_an_id_that_doesnt_exists_returns_a_404_code()
    {
        $response = $this->asAdmin()->getJson('/api/products/5');

        $response->assertStatus(404);
    }

    public function test_making_a_post_request_with_valid_data_creates_a_new_product()
    {
        $data = [
            'category_id' => 1, //vestimenta
            'title' => 'Remera deportiva yoga',
            'description' => 'Remera anti transpirante para tus clases de yoga.',
            'type_yoga' => 'Classic Yoga',
            'price' => 2000,
        ];

        $response = $this->asAdmin()->postJson('/api/products', $data);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', 0)

            );
            //Para verificar la creacion del producto, se hace una peticion que lo lea.

            $response = $this->asAdmin()->getJson('/api/products/3');

            $response 
                ->assertStatus(200)
                ->assertJson(fn (AssertableJson $json) =>
                    $json
                        ->where('status', 0)
                        ->where('data.category_id', $data['category_id'])
                        ->where('data.title', $data['title'])
                        ->where('data.description', $data['description'])
                        ->where('data.type_yoga', $data['type_yoga'])
                        ->where('data.price', $data['price'])
                        ->where('data.cover', null)
                        ->where('data.cover_description', null)
                        ->etc()
        );

    }
}
