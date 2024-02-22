@section('main')

<div class="col-12 d-flex flex-column justify-content-center align-items-center">
    <i class="fa-solid fa-circle-check"></i>
    <h2>Pago realizado con éxito</h2>
</div>
<div>
    <button><a class="nav-link text-white" href="{{ route('products.index') }}">Seguir Comprando</a></button>
</div>
@endsection