<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
/** @var \App\Models\User[]\Illuminate\Database\Eloquent\Collection $user  */
?>

@extends('layouts.main')
@section('title', 'Iniciar Sesión')
@section('main')
    <div class="container">
        <x-auth-data title="Iniciar Sesión" url="{{ route('auth.processLogin') }}" button-text="Iniciar Sesión"
            link-text="¿No tenés una cuenta? Registrate" link-url="{{ route('auth.formRegister') }}" />
    </div>
@endsection
