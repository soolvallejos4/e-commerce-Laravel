<?php
?>

@extends('layouts.main')

@section('title', 'Proceso de Pago')

@push('js')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("<?= $payment->getPublicKey();?>");
    mp.bricks().create("wallet", "mp-payment", {
        initialization: {
            preferenceId: "<?= $payment->preferenceId();?>",
            
        }
    });
</script>
@endpush

@section('main')
    <section id="cart">
        <div class="container">
           <h2 class="text-center mb-5">Checkout</h2>
            @if (count($cartItems) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item->getProduct()->title }}</td>
                                <td>{{ $item->getQuantity() }}</td>
                                <td>${{ $item->getProduct()->price }}</td>
                                <td>${{ $item->getSubtotal() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="total">
                    <p class="text-center fs-2 text-bold">Total: ${{ $cartTotal }}</p>
                </div>
            @else
                <p>No tienes productos en tu carrito.</p>
            @endif
        </div>
    </section>
    <div id="mp-payment">

    </div>
@endsection