<?php

/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $product  */
use Illuminate\Support\Facades\Storage;
?>
<section id="view-product">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                @if ($product->cover !== null && file_exists(public_path('img/' . $product->cover)))
                    <img class="mw-100 card-img-top" src="{{ url('img/' . $product->cover) }}" alt="{{ $product->cover_description }}">
                @else
                    <img class="mw-100 card-img-top" src="../img/no-photo.jpg" alt="No hay foto">
                @endif
            </div>
            <div class="col-md-6">
                <p>{{ $product->type_yoga }}</p>
                <h2>{{ $product->title }}</h2>
                <p>{{ $product->category->name }}</p>
                <hr>
                <p>Descripción</p>
                <p>{{ $product->description }}</p>
                
                @auth
                    <div class="d-flex justify-content-between">
                        <p class="fs-2"> <span class="text-bold">Precio: </span>${{ $product->price }}</p>
                        <form action="{{ route('cart.addItem', $product->product_id) }}" method="POST" class="add-to-cart-form">
                            @csrf
                            <div class="d-flex align-items-center mb-3">
                                <label for="quantity" class="fw-bold me-2"> Cantidad</label>
                                <input type="number" class="form-control quantity-input" value="1" name="quantity" id="quantity" min="1">
                            </div>
                            <button type="submit" class="w-100 py-4 px-4 mb-4">Agregar al carrito</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>
