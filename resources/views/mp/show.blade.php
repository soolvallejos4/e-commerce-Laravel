<?php
?>

@extends('layouts.main')

@section('title', 'Proceso de Pago')

@push('js')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("<?= $publicKey;?>");
    mp.bricks().create("wallet", "mp-payment", {
        initialization: {
            preferenceId: "<?= $pref->id;?>",
            
        }
    });
</script>
@endpush

@section('main')
    <h2>Mercado Pago Checkout</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Título</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>$ {{ $product->price }}</td>
                <td>1</td>
                <td>$ {{ $product->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="mp-payment">

    </div>
    
@endsection