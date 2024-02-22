<?php

namespace Tests\Unit;

use App\Cart\CartItem;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class CartItemTest extends TestCase
{
    public function createProduct(int $id = 1, int $price = 1500): Product
    {
        return new Product([
            'product_id' => $id,
            'price' => $price,
        ]);
    }

    public function test_can_instantiate_a_cartitem_with_a_product_and_a_default_quantity_of_1(): void
    {
        //Defino el producto que necesito para instanciar el CartItem
        $product = $this->createProduct();

        //Instanciamos la clase.
        $item = new \App\Cart\CartItem($product);

        //Verificacion de expectativas.
        //1. que $item sea una instancia de CartItem.
        //2. que GetProduct() de $item , retorne la misma instancia de Product que le proveimos en el constructor.
        //3. Que el getQuantity retorne un 1.

        $this->assertInstanceOf(\App\Cart\CartItem::class, $item);

        //AssertSame hace la comparacion con ===. En el caso de objetos, compara que sea la misma referencia. Ambos valores una referncia al  mismo objeto.
        $this->assertSame($product, $item->getProduct());
        //asserEquals hace la comparacion == . ES decir, busca que sea equivalente, no compara el tipo de dato.
        $this->assertEquals(1, $item->getQuantity());
    }

    public function test_can_instantiate_a_cartitem_with_a_product_and_a_costum_quantity(): void
    {
        $product = $this->createProduct();
        $quantity = 4;

        $item = new CartItem($product, $quantity);
        //Verifico que la cantidad sea la correcta.
        $this->assertEquals($quantity, $item->getQuantity());
    }

    public function test_can_set_the_cartitem_quantity(): void
    {
        $product = $this->createProduct();
        $item = new CartItem($product);
        $quantity = 5;

        $item->setQuantity($quantity);

        $this->assertEquals($quantity, $item->getQuantity());
    }

    public function test_can_increase_the_cart_item_quantity_by_a_default_amount_of_1(): void
    {
        $product = $this->createProduct();
        $item = new CartItem($product);

        $item->increaseQuantity();
        $this->assertEquals(2, $item->getQuantity());
    }
    public function test_can_increase_the_caritem_quantity_by_a_custom_amount(): void
    {
       $item = new CartItem($this-> createProduct()); 
        $item->increaseQuantity(3);
        
        $this->assertEquals(4, $item->getQuantity());
        
    }
    public function test_can_decrease_the_caritem_quantity_by_a_default_of_1(): void
    {
        $item = new CartItem($this-> createProduct(), 3); 
        $item->decreaseQuantity();
        $this->assertEquals(2, $item->getQuantity());
    }
    public function test_can_decrease_the_caritem_quantity_by_a_custom_amount(): void
    {
        $item = new CartItem($this-> createProduct(), 3); 
        $item->decreaseQuantity(2);
        $this->assertEquals(1, $item->getQuantity());
    }

    public function test_can_get_the_cartitem_subtotal(): void
    {
        $item = new CartItem($this->createProduct(1, 1499), 2);
        $expectedSubtotal = 1499 * 2; // 2998

        $this->assertEquals($expectedSubtotal, $item->getSubtotal());
    }
}
