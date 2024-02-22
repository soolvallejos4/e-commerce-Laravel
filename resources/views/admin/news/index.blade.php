<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.admin')
@section('title', 'Noticias')
@section('main')

    <section class="container" id="news">
        <div class="row d-flex justify-content-center align-items-center mb-3">
            <h2 class="text-center"> <span>Noticias </span>Sobre Yoga</h2>
            @auth
                <a href="{{ route('admin.news.formNew') }}" class="text-center btn boton">Agregar Noticia</a>
            @endauth
        </div>
        <div class="row d-flex">
            @foreach ($news as $news)
                <div class="col-lg-4 col-md-6 col-sm-12  d-flex justify-content-center align-items-center">
                    <div class="card m-2">
                        @if ($news->cover !== null && file_exists(public_path('img/' . $news->cover)))
                            <img class="mw-100 card-img-top" src="{{ url('img/' . $news->cover) }}"
                                alt="{{ $news->cover_description }}">
                        @else
                            <p>Acá iría una imagen diciendo que no hay imagen.</p>
                        @endif

                        <div class="card-body">
                            <h3 class="card-title">{{ $news->title }}</h3>
                            <p class="card-text">{{ $news->subtitle }}</p>
                            <div>
                                <p>Por: {{ $news->author }}</p>
                            </div>
                            <a href="{{ route('admin.news.view', ['id' => $news->news_id]) }}" class="btn boton">Leer
                                Más</a>
                            @auth

                                <a href="{{ route('admin.news.formEdit', ['id' => $news->news_id]) }}"
                                    class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                                <a href="{{ route('admin.news.confirmDelete', ['id' => $news->news_id]) }}"
                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            @endauth

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </section>

@endsection
