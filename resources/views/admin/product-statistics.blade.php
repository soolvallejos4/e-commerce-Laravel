@extends('layouts.admin')
@section('title', 'Panel de Administracion') 
@section('main')


<div class="row my-5 text-center">
   <h2>Estadísticas de Productos</h2>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h3>Producto Más Comprado</h3>
            <ul>
                @foreach ($mostPurchasedProducts as $product)
                    <li>{{ $product->title }} - Cantidad: {{ $product->total_quantity }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h3>Producto Menos Comprado</h3>
            <ul>
                @foreach ($leastPurchasedProducts as $product)
                    <li>{{ $product->title }} - Cantidad: {{ $product->total_quantity }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 flex-column d-flex text-center">
            <h3>Total de Pedidos</h3>
            <p>{{ $totalOrders }}</p>
        </div>
    </div>
</div>
@endsection






