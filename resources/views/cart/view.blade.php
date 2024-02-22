@extends('layouts.main')
@section('title', 'Carrito')

@section('main')
    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center py-4">
                    <h2>Mi Carrito</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if (count($cartItems) > 0)
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->getProduct()->title }}</td>
                                            <td>
                                                <input type="number" name="quantity[{{ $item->getProduct()->product_id }}]"
                                                    value="{{ $item->getQuantity() }}" min="1">
                                            </td>
                                            <td>${{ $item->getProduct()->price }}</td>
                                            <td>${{ $item->getSubtotal() }}</td>
                                            <td>
                                                <a href="{{ route('cart.remove', ['product' => $item->getProduct()->product_id]) }}"
                                                    class="btn btn-danger "><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end mb-3">
                                    <button type="submit" class="btn btn-primary">Actualizar Carrito</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

            <div class="row">
                <hr>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <p class="fs-2 text-bold">Total: ${{ $cartTotal }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <button class="mx-2 w-50"> <a class="nav-link text-white"
                                href="{{ route('products.index') }}">Continuar Comprando</a> </button>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">Hacer Pedido</button>
                        </form>
                    </div>
                </div>

                </form>
            @else
                <p>No tienes productos en tu carrito.</p>
                @endif
            </div>
    </section>
@endsection
