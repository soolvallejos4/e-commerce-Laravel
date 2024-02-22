<?php
/** @var \App\Models\News[]\Illuminate\Database\Eloquent\Collection $news  */
?>
    <section class="container" id="noticia">
        <div class="row mt-5">
            <div class="col-md-6 col-12 order-md-2">
                @if ($news->cover !== null && file_exists(public_path('img/' . $news->cover)))
                    <img class="mw-100" src="{{ url('img/' . $news->cover) }}" alt="{{ $news->cover_description }}">
                @else
                    <img class="mw-100 card-img-top" src="/img/no-photo.jpg" alt="No hay foto">
                @endif
            </div>
            <div class="col-md-6 col-12 order-md-1 mt-3">
                <h2>{{ $news->title }}</h2>
                <p>{{ $news->subtitle }}</p>
                <p>{{ \Carbon\Carbon::parse($news->news_date)->format('d-m-Y H:i') }}</p>
                <p>{{ $news->body }}</p>
            </div>
        </div>
    </section>



