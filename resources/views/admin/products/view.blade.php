<?php
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $product  */
?>
@extends('layouts.admin')
@section('title', 'Productos')
@section('main')
    <x-product-data :product="$product" />

@endsection
