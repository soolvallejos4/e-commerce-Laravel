<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>

@extends('layouts.main')
@section('title', 'Noticias')
@section('main')

    <x-news-data :news="$news" />


@endsection
