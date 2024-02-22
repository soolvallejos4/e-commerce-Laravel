<?php
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $products  */
?>

@extends('layouts.main')
@section('title', 'Productos')
@section('main')

    <section class="container-fluid" id="products">
        <div class="row d-flex justify-content-center align-items-center">
            <h2 class="text-center mt-5"> <span>Nuestros </span>Productos</h2>
        </div>

        <div class="row">
            <ul class="col-lg-12 col-md-12 col-sm-12 list-unstyled d-flex flex-wrap">
                @foreach ($products as $product)
                    <li class="col-lg-4 col-md-6 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                        <div class="card m-2">

                            @if ($product->cover !== null && file_exists(public_path('img/' . $product->cover)))
                                <img class="mw-100 card-img-top" src="{{ url('img/' . $product->cover) }}"
                                    alt="{{ $product->cover_description }}">
                            @else
                                <img class="mw-100 card-img-top" src="../img/no-photo.jpg" alt="No hay foto">
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
                                    <a href="{{ route('products.view', ['id' => $product->product_id]) }}"
                                        class="btn boton"><i class="fa-solid fa-eye"></i></a>
                                </div>
                                @auth
                                    <div>

                                        <form
                                            action="{{ route('products.processReservation', ['id' => $product->product_id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary boton-reserva">Reservar
                                                Producto</button>
                                        </form>

                                    </div>
                                @endauth

                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </section>
@endsection
