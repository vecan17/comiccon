@extends('layouts.app')

@section('meta-tags')
    <meta name="title" content="{{ $post->seo_title }}">
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
@endSection

@section('title', $post->getTranslatedAttribute('title'))

@section('content')

    <div class="header-title-news">
        <div class="header-title-image" style></div>
    </div>
    <h1 class="header-title-news-h1">{{ $post->getTranslatedAttribute('title') }}</h1>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h6 class="date">{{ $post->created_at->diffForHumans() }}</h6>
                    <div class="blog-category mb-5 text-white">
                        Categoria:&nbsp;
                        <span
                            class="badge badge-primary">{{ is_null($post->category_id) ? 'Uncategorized' : $post->category->name }}</span>
                    </div>
                    {!! clean($post->getTranslatedAttribute('body')) !!}
                </div>
            </div>
        </div>
    </div>
    @if (count($related_posts) > 0)
        <div class="section">
            <div class="container">
                <div class="row">

                    <h2 class="title text-center">Relacionado</h2>
                    <br />
                    @foreach ($related_posts as $post)

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
            </div>
        </div>
    @endif

@endSection
