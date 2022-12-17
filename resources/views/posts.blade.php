@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="header-title-player">
        <h1>{{ __('news.page-title') }}</h1>
    </div>
    <div class="main main-raised mt-5">
        <div class="container">
            @if (count($posts) > 0)
                <div class="row mt-5">
                    @foreach ($posts as $post)
                        <div class="col-12 col-lg-6">
                            <article class="news-popular-item">
                                <a href="/post/{{ $post->slug }}" class="news-popular-item-image">
                                    <img
                                        src="{{ is_null($post->image) ? asset('frontend/assets/img/default.png') : Voyager::image($post->image) }}" />
                                </a>
                                <div class="news-popular-item-content">
                                    <h5>{{ $post->getTranslatedAttribute('title') }}</h5>
                                    <p>Por {{ is_null($post->authorId) ? 'Admin' : $post->authorId->name }}</p>
                                    <p>{{ $post->created_at->diffForhumans() }} </p>
                                    <a href="/post/{{ $post->slug }}" class="read-more-btn">Leer mas</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                No items to show
            @endif
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

        @if (count($featured_posts) > 0)
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <h2 class="title ml-1">Featured</h2>
                            <br />
                            @foreach ($featured_posts as $post)
                                <div class="card blog-horizontal">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card-image">
                                                <a href="/post/{{ $post->slug }}">
                                                    <img
                                                        src="{{ is_null($post->image) ? asset('frontend/assets/img/default.png') : Voyager::image($post->image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    <a href="/post/{{ $post->slug }}"
                                                        class="card-link text-white">{{ $post->getTranslatedAttribute('title') }}</a>
                                                </h3>
                                                <p class="card-description">
                                                    {{ Str::words($post->getTranslatedAttribute('excerpt'), 10) }}
                                                    <a href="/post/{{ $post->slug }}"> Read More </a>
                                                </p>

                                                <div class="author">
                                                    <p>By {{ is_null($post->authorId) ? 'Admin' : $post->authorId->name }}
                                                    </p>
                                                    <p>{{ $post->created_at->diffForhumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection
