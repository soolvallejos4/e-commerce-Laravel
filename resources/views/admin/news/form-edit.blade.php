<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.main')

@section('title', 'Editar Noticia')

@section('main')
    <div class="container">
        <h2 class="my-3 text-center">Editar Noticia '{{ $news->title }}'</h2>

    <form action="{{ route('admin.news.processEdit', ['id' => $news->news_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" class="form-control"
                @error('title') aria-describedby="error-title" @enderror value="{{ old('title', $news->title) }}">
            @error('title')
                <div class="text-danger" id="error-title">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitulo</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control"
                @error('subtitle') aria-describedby="error-subtitle" @enderror
                value="{{ old('subtitle', $news->subtitle) }}">
            @error('subtitle')
                <div class="text-danger" id="error-subtitle">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" id="author" name="author" class="form-control"
                value="{{ old('author', $news->author) }}">
        </div>
        <div class="mb-3">
            <label for="news_date" class="form-label">Fecha Publicacion</label>
            <input type="date" id="news_date" name="news_date" class="form-control"
                @error('news_date') aria-describedby="error-news_date" @enderror
                value="{{ old('news_date', $news->news_date) }}">
            @error('news_date', $news->news_date)
                <div class="text-danger" id="error-news_date">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Cuerpo de la Noticia</label>
            <textarea id="body" name="body" class="form-control" @error('body') aria-describedby="error-body" @enderror>{{ old('body', $news->body) }}</textarea>
            @error('body')
                <div class="text-danger" id="error-body">{{ $message }} </div>
                @endif
            </div>
            <div class="mb-3">
                <p>Imagen actual</p>
                @if ($news->cover !== null && file_exists(public_path('img/' . $news->cover)))
                    <img class="mw-100" src="{{ url('img/' . $news->cover) }}" alt="{{ $news->cover_description }}">
                @else
                    <p>Acá iría una imagen diciendo que no hay imagen.</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" id="cover" name="cover" class="form-control">

            </div>
            <div class="mb-3">
                <label for="cover_description" class="form-label">Descripción de la Portada</label>
                <input type="text" id="cover_description" name="cover_description" class="form-control"
                    value="{{ old('cover_description', $news->cover_description) }}">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Editar</button>
        </form>
    </div>
    @endsection