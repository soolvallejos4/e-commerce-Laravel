<?php
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $product  */
?>
@extends('layouts.main')
@section('title', 'Productos')
@section('main')
    <x-product-data :product="$product" />
    <form action="{{ route('products.processDelete', ['id' => $product->product_id]) }}" method="post">
        @csrf
        <h2 class="mb-3">Confirmación Necesaria</h2>

        <p class="mb-3">¿Estás seguro que querés eliminar este producto?</p>

        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
    </form>
@endsection
