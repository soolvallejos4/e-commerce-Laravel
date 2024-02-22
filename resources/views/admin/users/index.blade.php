@extends('layouts.admin')
@section('title', 'Panel de Administración')
@section('main')
    <h2>Usuarios y sus productos</h2>

    @if ($users->isEmpty())
        <p>No hay usuarios registrados en el sistema.</p>
    @else
        <div class="container table-responsive py-5">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Compras</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->email }}</th>
                            <td>
                                @if ($user->orders->isEmpty())
                                    <p>No ha realizado ningún pedido</p>
                                @else
                                    @foreach ($user->orders as $order)
                                        <h3>Pedido Número: {{ $order->order_id }}</h3>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Fecha de pedido</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
                                                @foreach ($order->orderDetails as $detail)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-y H:i') }}
                                                        </td>
                                                        <td>{{ $detail->product->title }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td>${{ $detail->product->price }}</td>
                                                        <td>${{ $detail->subtotal }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
