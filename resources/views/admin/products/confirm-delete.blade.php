<?php
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $product  */
?>
@extends('layouts.admin')
@section('title', 'Productos')
@section('main')
    <x-product-data :product="$product" />
    <form action="{{ route('admin.products.processDelete', ['id' => $product->product_id]) }}" method="post">
        @csrf
       <div class="d-flex justify-content-center align-items-center flex-column">
        <h2 class="mb-3 text-bold">¡Confirmación Necesaria!</h2>

        <p class="mb-3">¿Estás seguro que querés eliminar este producto?</p>

        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
       </div>
    </form>
@endsection
