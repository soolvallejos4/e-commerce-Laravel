<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Cart\Cart;
use App\Cart\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
use Session;

class CartController extends Controller
{
    public function addItem(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);

        // Obtener el carrito de la sesión o crea uno si no existe
        $cart = Session::get('cart', new Cart());

        $cartItem = new CartItem($product, $quantity);
        $cart->addItem($cartItem);

        // Guarda el carrito en la sesión
        Session::put('cart', $cart);

        return redirect()
       ->route('products.index')
       ->with('feedback.message', 'Producto agregado al carrito.'); 
    }

    public function viewCart()
    {
        // oteber el carrito de la sesión
        $cart = Session::get('cart', new Cart());

        $cartItems = $cart->getItems();
        $cartTotal = $cart->getTotal();

        return view('cart.view', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal
        ]);

    }
    public function update(Request $request)
    {
        $cart = Session::get('cart', new Cart());
        $updatedQuantities = $request->input('quantity', []);

        foreach ($updatedQuantities as $productId => $quantity) {
            if ($quantity > 0) {
                $cartItem = $cart->getItem($productId);
                if ($cartItem) {
                    $cartItem->setQuantity($quantity);
                }
            } else {
                $cart->removeItem($productId);
            }
        }

        // Guarda el carrito actualizado en la sesión
        Session::put('cart', $cart);


        return redirect()
        ->route('cart.view')
        ->with('feedback.message', 'Carrito actualizado.');
    }
    public function remove($productId)
    {
        $cart = Session::get('cart', new Cart());
        $cart->removeItem($productId);

        // Guarda el carrito actualizado en la sesión
        Session::put('cart', $cart);

        return redirect()
        ->route('cart.view')
        ->with('feedback.message', 'Producto eliminado del carrito.');
    }

    public function checkout()
    {
        $user = Auth::user();
        $cart = Session::get('cart', new Cart());

        // Crea un nuevo pedido
        $order = new Order([
            'user_id' => $user->user_id,

        ]);
        $order->save();

        // Agrega los detalles del pedido
        foreach ($cart->getItems() as $cartItem) {
            $orderDetail = new OrderDetail([
                'order_id' => $order->order_id,
                'product_id' => $cartItem->getProduct()->product_id, 
                'quantity' => $cartItem->getQuantity(),
                'subtotal' => $cartItem->getSubtotal(),
            ]);
            $orderDetail->save();
        }
       return redirect()
       ->route('mp.test2')
       ->with('feedback.message', 'Pedido Realizado con Éxito.');
    }

}
