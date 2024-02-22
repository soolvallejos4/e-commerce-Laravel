<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.main')
@section('title', 'Noticias')
@section('main')

    <section class="container" id="news">
        <div class="row d-flex justify-content-center align-items-center mb-3">
            <h2 class="text-center mt-5"> <span>Noticias </span>Sobre Yoga</h2>
         
        </div>
        <div class="row d-flex">
            @foreach ($news as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                <article class="card m-2">
                    @if ($item->cover !== null && file_exists(public_path('img/' . $item->cover)))
                    <img class="mw-100 card-img-top" src="{{ url('img/' . $item->cover) }}"
                        alt="{{ $item->cover_description }}">
                    @else
                    <img class="mw-100 card-img-top" src="../img/no-photo.jpg" alt="No hay foto">
                    @endif
    
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->title }}</h3>
                        <p class="card-text">{{ $item->subtitle }}</p>
                        <div>
                            <p>Por: {{ $item->author }}</p>
                        </div>
                        <a href="{{ route('news.view', ['id' => $item->news_id]) }}" class="btn boton">Leer Más</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </section>

@endsection
