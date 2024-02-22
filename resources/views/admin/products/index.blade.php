<?php
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $products  */
?>

@extends('layouts.admin')
@section('title', 'Productos')
@section('main')

    <section class="container" id="products">
        <div class="row d-flex justify-content-center align-items-center">
            <h2 class="text-center mt-5"> <span>Nuestros </span>Productos</h2>
            @auth
                <a href="{{ route('admin.products.formNew') }}" class="btn boton ">Agregar Producto</a>
            @endauth
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="card m-2">

                        @if ($product->cover !== null && file_exists(public_path('img/' . $product->cover)))
                            <img class="mw-100 card-img-top" src="{{ url('img/' . $product->cover) }}"
                                alt="{{ $product->cover_description }}">
                        @else
                            <p>Acá iría una imagen diciendo que no hay imagen.</p>
                        @endif
                        <div class="card-body">

                            <p class="mb-5">{{ $product->category->name }}</p>
                            <div class="d-flex flex-column">
                                <h3 class="card-title">{{ $product->title }}</h3>
                                <p>{{ $product->type_yoga }}</p>
                                <hr>
                                <p>{{ $product->category->name }}</p>
                            </div>
                            <p>
                                {{ $product->description }}
                            </p>
                            <hr>
                            <div>

                                @foreach ($product->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach

                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-5">
                                <p> ${{ $product->price }}</p>
                                <a href="{{ route('admin.products.view', ['id' => $product->product_id]) }}"
                                    class="btn boton"><i class="fa-solid fa-eye"></i></a>
                            </div>
                            @auth
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.products.formEdit', ['id' => $product->product_id]) }}"
                                        class="btn btn-success m-2"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ route('admin.products.confirmDelete', ['id' => $product->product_id]) }}"
                                        class="btn btn-danger m-2"><i class="fa-solid fa-trash"></i></a>


                                </div>
                            @endauth

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
