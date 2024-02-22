<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
?>

@extends('layouts.main')

@section('title', 'Publicar una Noticia')

@section('main')
    <h2 class="mb-3">Publicar una Noticia</h2>

    <form action="{{ route('news.processNew') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" class="form-control"
                @error('title') aria-describedby="error-title" @enderror value="{{ old('title') }}">
            @error('title')
                <div class="text-danger" id="error-title">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitulo</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control"
                @error('subtitle') aria-describedby="error-subtitle" @enderror value="{{ old('subtitle') }}">
            @error('subtitle')
                <div class="text-danger" id="error-subtitle">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="news_date" class="form-label">Fecha Publicacion</label>
            <input type="date" id="news_date" name="news_date" class="form-control" value="{{ old('news_date') }}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Cuerpo de la Noticia</label>
            <textarea id="body" name="body" class="form-control" @error('body') aria-describedby="error-body" @enderror>{{ old('body') }}</textarea>
            @error('body')
                <div class="text-danger" id="error-body">{{ $message }} </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" id="cover" name="cover" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cover_description" class="form-label">Descripción de la Portada</label>
                <input type="text" id="cover_description" name="cover_description" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
    @endsection
