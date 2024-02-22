<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Session;

class MercadoPagoController extends Controller
{
    /* public function show()
    {
        $products = Product::all();

        //Configuramos el SDK 

        \MercadoPago\SDK::setAccessToken(config('mercadopago.accessToken'));



        //Creo los items.

        $items = [];

        foreach ($products as $product) {
            $item = new \MercadoPago\Item();

            //Cada item debe tener al menos titulo, precio unitario, y cantidad.

            $item->title = $product->title;
            $item->unit_price = $product->price;
            $item->quantity = 1;

            $items[] = $item;
        }
        //Crear la preferencia. 

        $pref = new \MercadoPago\Preference();
        $pref->items = $items;


        //URL de retorno cuando el flujo de cobro se completa.
        $pref->back_urls = [
            'success' => route('mp.success'),
            'pending' => route('mp.pending'),
            'failure' => route('mp.failure'),
        ];

        //En caso de exito retorna automaticamente en 5 segundos.

        $pref->auto_return = 'approved';


        //Guardo la preferencia para que genere el id de preferencia.
        $pref->save();


        return view('mp.show', [
            'products' => $products,
            'pref' => $pref,
            'publicKey' => config('mercadopago.publicKey')
        ]);
    } */


    public function showV2()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $cart = Session::get('cart', new Cart());
        $products = Product::all();
        $cartItems = $cart->getItems();
        $cartTotal = $cart->getTotal();

        $payment = new \App\PaymentProviders\MercadoPagoPayment;
        $payment
            ->addItems($cart)
            ->withBackUrls(
                success: route('mp.success'),
                pending: route('mp.pending'),
                failure: route('mp.failure'),
            )
            ->withAutoReturn()
            ->save();


        return view('mp.show-v2', [
            'user' => $user, // Pasar el usuario autenticado a la vista
            'products' => $products,
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
            'payment' => $payment,
            'publicKey' => $payment->getPublicKey(), // Agregar la clave pública de Mercado Pago
            'pref' => $payment->preferenceId(), // Agregar el ID de preferencia de Mercado Pago
        ]);
    }
    public function processSuccess(Request $request)
    {

        $cart = Session::get('cart', new Cart());
        Session::forget('cart');
        return redirect()
            ->route('products.index')
            ->with('feedback.message', 'Pago realizado con éxito.');
    }
    public function processPending(Request $request)
    {
        $cart = Session::get('cart', new Cart());
        Session::forget('cart');
        return redirect()
            ->route('products.index')
            ->with('feedback.message', 'Pago pendiente.');
    }
    public function processFailure(Request $request)
    {
        echo "Failure...";
        dd($request);
    }
}
