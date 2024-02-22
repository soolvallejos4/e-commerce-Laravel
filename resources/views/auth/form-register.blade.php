<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
/** @var \App\Models\User[]\Illuminate\Database\Eloquent\Collection $user  */
?>

@extends('layouts.main')
@section('title', 'Registro')
@section('main')
    <div class="container">
        <x-auth-data title="Registro" url="{{ route('auth.processRegister') }}" button-text="Registrarse"
            link-text="¿Ya tienes una cuenta?" link-url="{{ route('auth.formLogin') }}" />

    </div>
@endsection
