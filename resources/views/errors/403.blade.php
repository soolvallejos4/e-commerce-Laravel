{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
@extends('layouts.main')
@section('title', 'Pagina no encontrada')
@section('main')
    <div class="container d-flex flex-column justify-content-center align-items-center text-center align-self-center">
        <h1 class="text-dark fs-1 mt-5 text-bold">403</h1>
        <h2>Forbidden</h2>
        <p>Se niega el acceso a este recurso en el servidor</p>
        <a href="{{route ('home')}}" type="button" class="boton">Volver al Inicio</a>
    </div>
    
@endsection