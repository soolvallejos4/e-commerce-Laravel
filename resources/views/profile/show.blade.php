@extends('layouts.main')
@section('title', 'Mi perfil')

@section('main')
    <div class="row mt-5 text-center">
        <h2>Perfil del Usuario</h2>
    </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-center align-items-center">
        <img src="/img/user_profile.png" alt="user-picture-profile">
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-12 text-center">
        <p><span class="text-bold">Email:</span> {{ $user->email }}</p>
        <a href="{{ route('profile.edit') }}" class="btn btn-success"> <i class="fa-solid fa-pen"></i> Editar Perfil</a>
    </div>
  </div>

  <div class="row mt-5 text-center">
    <h2>Historial de Pedidos</h2>
</div>
    
   <div class="container">
<div class="col-12">
    <div class="row">
        @if ($user->orders->count() > 0)
        @foreach ($user->orders as $order)
            <h3>Pedido Número: {{ $order->order_id }}</h3>

            <table class="table">
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
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-Y H:i') }}</td>
                            <td>{{ $detail->product->title }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>${{ $detail->product->price }}</td>
                            <td>${{ $detail->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endforeach
    @else
        <p>No tienes historial de pedidos.</p>
    @endif
    </div>
</div>
   </div>
@endsection
