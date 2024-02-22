<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.main')
@section('title', 'Confirmacion para eliminar la Noticia' . $news->title)
@section('main')
    <x-news-data :news="$news" />
    <hr>
    <form action="{{ route('news.processDelete', ['id' => $news->news_id]) }}" method="post">
        @csrf
        <h2 class="mb-3">Confirmación Necesaria</h2>

        <p class="mb-3">¿Estás seguro que querés eliminar esta noticia?</p>

        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
    </form>
@endsection
