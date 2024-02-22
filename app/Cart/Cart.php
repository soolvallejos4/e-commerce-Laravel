<?php

namespace App\Cart;

use App\Models\Product;

class Cart
{
    private array $items = []; //Array de cartitem.
    public function addITem(CartItem $newItem)
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->product_id === $newItem->getProduct()->product_id) {
                $item->increaseQuantity();

                return;
            }
        }

        $this->items[]  = $newItem;
    }

    public function removeItem(int $id): void
    {
        foreach($this->items as $key =>$item) {
            if($item->getProduct()->product_id === $id) {
                
                unset($this->items[$key]);
                return;
            }
        }
    }

    public function getItem(int $id)
    {
        foreach($this->items as $item) {
            if($item->getProduct()->product_id == $id) {
                return $item;
            }
        }
        return null;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal(): int
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->getSubtotal();
        }

        return $total;
    }
}
