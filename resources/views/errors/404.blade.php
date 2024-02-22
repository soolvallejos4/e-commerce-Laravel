@extends('layouts.main')
@section('title', 'Pagina no encontrada')
@section('main')
    <div class="container d-flex flex-column justify-content-center align-items-center text-center align-self-center">
        <img src="/img/404.jpg" class="img-fluid w-50" alt="error-404">
        <h2>¡Página no encontrada!</h2>
        <a href="{{route ('home')}}" type="button" class="boton">Volver al Inicio</a>
    </div>
    
@endsection
