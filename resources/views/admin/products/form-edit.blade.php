<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
/** @var \App\Models\Product[]\Illuminate\Database\Eloquent\Collection $product  */
/** @var \App\Models\Category[]\Illuminate\Database\Eloquent\Collection  $categories */
/** @var \App\Models\Tag[]\Illuminate\Database\Eloquent\Collection  $tags  */
?>
@extends('layouts.admin')

@section('title', 'Editar Producto')

@section('main')
    <h2 class="mb-3">Editar Producto '{{ $product->title }}'</h2>

    <form action="{{ route('admin.products.processEdit', ['id' => $product->product_id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" class="form-control"
                @error('title') aria-describedby="error-title" @enderror value="{{ old('title', $product->title) }}">
            @error('title')
                <div class="text-danger" id="error-title">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción del Producto</label>
            <textarea id="description" name="description" class="form-control"
                @error('description') aria-describedby="error-description" @enderror>{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger" id="error-description">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-control"
                @error('category_id') aria-describedby="error-category_id" @enderror>
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}" @selected(old('category_id', $product->category_id) == $category->category_id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger" id="error-category_id">{{ $message }}</div>
            @enderror
        </div>
        <fieldset class="mb-4">
            <legend class="fs-5">Etiquetas de Producto</legend>
            @foreach ($tags as $tag)
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" name="tag_id[]" class="form-check-input" value={{ $tag->tag_id }}
                            @checked(in_array($tag->tag_id, old('tag_id', $product->getTagIds())))>
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </fieldset>
        <div class="mb-3">
            <label for="type_yoga" class="form-label">Tipo de Yoga</label>
            <input type="text" id="type_yoga" name="type_yoga" class="form-control"
                value="{{ old('type_yoga', $product->type_yoga) }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="text" id="price" name="price" class="form-control"
                @error('price') aria-describedby="error-price" @enderror value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="text-danger" id="error-price">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <p>Imagen actual</p>
            @if ($product->cover !== null && Storage::has('img/' . $product->cover))
                <img class="mw-100" src="{{ Storage::url('img/' . $product->cover) }}"
                    alt="{{ $product->cover_description }}">
            @else
                <p>Acá iría una imagen diciendo que no hay imagen.</p>
            @endif
            <div class="mb-3">
                <label for="cover" class="form-label">Portada</label>
                <input type="file" id="cover" name="cover" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cover_description" class="form-label">Descripción de la Portada</label>
                <input type="text" id="cover_description" name="cover_description" class="form-control"
                    value="{{ old('cover_description', $product->cover_description) }}">
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection
