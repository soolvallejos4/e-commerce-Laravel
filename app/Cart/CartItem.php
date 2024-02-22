<?php

namespace App\Cart;

use App\Models\Product;

class CartItem
{
   public function __construct(

      private Product $product,
      private int $quantity = 1 //Es un parametro opcional que por defecto tiene el valor 1.
   ) {
   }

   public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity(int $increaseBy = 1): void
    {
        $this->quantity += $increaseBy;
    }

    public function decreaseQuantity(int $decreaseBy = 1): void
    {
        $this->quantity -= $decreaseBy;
    }

    public function getSubtotal(): int
    {
        /* return $this->getProduct()->price * $this->quantity; */
        return $this->product->price * $this->quantity;
    }
}
