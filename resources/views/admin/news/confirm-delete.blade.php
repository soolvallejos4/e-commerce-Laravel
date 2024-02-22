<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.admin')
@section('title', 'Confirmacion para eliminar la Noticia' . $news->title)
@section('main')
    <x-news-data :news="$news" />
    <hr>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form action="{{ route('admin.news.processDelete', ['id' => $news->news_id]) }}" method="post">
            @csrf
            <h2 class="mb-3 text-bold">¡Confirmación Necesaria!</h2>
    
            <p class="mb-3 text-center">¿Estás seguro que querés eliminar esta noticia?</p>
    
            <button type="submit" class="btn btn-danger w-100">Sí, eliminar</button>
        </form>
    </div>
@endsection
