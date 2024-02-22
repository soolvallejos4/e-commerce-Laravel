<?php

namespace Tests\Unit;

use App\Cart\CartItem;
use App\Cart\Cart;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use PHPUnit\Framework\Attributes\Depends;

class CartTest extends TestCase
{

    public function createItem(int $id = 1, float $price = 1300, int $quantity = 1)
    {
        $product = new Product();
        $product->product_id = $id;
        $product->price = $price;
        return new CartItem($product, $quantity);
    }
    public function test_can_add_a_cartitem_to_the_cart(): Cart
    {
        $id = 1;
        $item = $this->createItem($id);
        //Creo el carrito
        $cart = new \App\Cart\Cart;

        $cart->addItem($item);

        //Verifico la cantidad de elementos del array. Si es un array vacio y le agregue un solo producto, deberia haber un solo producto.

        $this->assertCount(1, $cart->getItems());
        $this->assertSame($item, $cart->getItems()[0]);
        $this->assertSame($item, $cart->getItem($id));
        //Retornamos la instancia del cart. Esto va a permitir que otro test utilice como una dependencia el retorno de este test.
        //En el metodo que sigue, podemos pedir recibir este valor.
        return $cart;
    }

    //Declaramos la dependencia del test.
    //Para hacer esta declaracion, se usa el atributo Depends de PhpUnit. 
    #[Depends('test_can_add_a_cartitem_to_the_cart')]
    public function test_can_add_another_different_cartitem_to_the_array_to_include_it_in_the_items(Cart $cart): Cart
    {
    
        $id = 5;
        $item = $this->createItem($id);

        $cart->addITem($item);

        $this->assertCount(2, $cart->getItems());
        $this->assertSame($item, $cart->getItems()[1]);
        $this->assertSame($item, $cart->getItem($id));

        return $cart;
    }

    #[Depends('test_can_add_another_different_cartitem_to_the_array_to_include_it_in_the_items')]
    public function test_can_add_already_included_item_to_increase_its_quantity_instead_of_adding_a_new_item_to_the_cart(Cart $cart): Cart
    {
        $cart = new \App\Cart\Cart;
        $cart->addITem($this->createItem());
        $id = 5;
        $cart->addITem($this->createItem($id));

        $cart->addITem($this->createItem($id));


        $this->assertCount(2, $cart->getItems());
        $this->assertSame(2, $cart->getItem($id)->getQuantity());

        return $cart;
    }

    #[Depends('test_can_add_already_included_item_to_increase_its_quantity_instead_of_adding_a_new_item_to_the_cart')]
    public function test_can_remove_an_item_included_in_the_art(Cart $cart)
    {
        $id = 1;
        
        $cart->removeItem($id);

        $this->assertCount(1, $cart->getItems());
        $this->assertSame(null, $cart->getItem($id));

    }
    public function test_can_get_the_cart_total_cost()
    {
        $cart = new Cart();

        $cart->addItem($this->createItem(1, 1500, 2));
        $cart->addItem($this->createItem(2, 2400, 1));
        $cart->addItem($this->createItem(3, 3500, 1));

        $expectedResult = ( 1500 * 2 ) + 2400 + 3500;

        $this->assertSame($expectedResult, $cart->getTotal());
    }
   
}

