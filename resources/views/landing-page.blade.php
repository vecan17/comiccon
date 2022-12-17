@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('Carrusel.index')

    <div class="wrapper">

        <!-- Hero Section Begin -->
        <!--<section class="hero-section set-bg"
                                                data-setbg="{{ is_null(setting('hero.image')) ? asset('frontend/assets/img/header-bg.jpg') : Voyager::image(setting('hero.image')) }}">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="hs-item">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="hs-text">
                                                                                <h4>{{ is_null(setting('hero.small_title')) ? 'eSports Gaming' : setting('hero.small_title') }}
                                                                                </h4>
                                                                                <h2>{{ is_null(setting('hero.large_title')) ? 'We organize esports tournament' : setting('hero.large_title') }}
                                                                                </h2>
                                                                                <a href="/tournaments" class="btn btn-lg btn-info">See Tournaments</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>-->
        <!-- Hero Section End -->

        @include('Game.index')

        <!-- Match Section Begin -->
        @include('sections.matches')
        <!-- Match Section End -->

        <!-- latest-news Section Begin -->
        @if (count($latest_posts) > 0)
            <div class="container">

                <section class="latest-news">

                    <div class="latest-news-title">
                        <h5 style="color:var(--color-yellow)">Consulta otras noticias</h5>
                    </div>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
                        viewBox="0 0 1712.6 75" style="enable-background:new 0 0 1712.6 75" xml:space="preserve" class="svg-cord-news0">
                        <style>
                            .st0 {
                                fill: none;
                                stroke: #be8f2d;
                                stroke-width: 3;
                                stroke-miterlimit: 10
                            }
                        </style>
                        <path class="st0"
                            d="m843.5 37.9-19.6 20.3-19.6-20.3 19.6-20.3 19.6 20.3zM908.3 37.9l-19.6 20.3-19.6-20.3 19.6-20.3 19.6 20.3z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="m889.9 37.9-33.6 34.9-33.6-34.9L856.3 3l33.6 34.9zM789 3l-27.5 23h-51.3l-22.8 22.8h-97.7L547.2 3"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="M813.4 28.4 789 3h-83.8l-19.7 19.1H0M888.5 17.5l19.6 20.3-19.6 20.3L869 37.9l19.5-20.4z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0" d="m823.7 17.6 19.6 20.3-19.6 20.3-19.6-20.3 19.6-20.3z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="m856.1 3 33.6 34.9-33.6 34.9-33.6-34.9L856.1 3zM923.4 3l27.5 23h51.3l22.8 22.8h97.7L1165.2 3"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0" d="M899.2 28.4 923.7 3h83.8l19.7 19.1h685.4"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                    </svg>
                    @foreach ($latest_posts as $post)
                        <article class="latest-news-item {{ $loop->first ? 'long' : '' }}">
                            <a href="/post/{{ $post->slug }}">
                                <div class="latest-news-item-content">
                                    <h3>{{ $post->getTranslatedAttribute('title') }}</h3>
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                    <p>{{ is_null($post->authorId) ? 'Admin' : $post->authorId->name }}</p>
                                </div>
                                <div class="latest-news-item-image" style="margin:3px; border-radius:30px;">
                                    <img src="{{ is_null($post->image) ? asset('frontend/assets/img/default.png') : Voyager::image($post->image) }}"
                                        alt="Merakla beklenen yeni etkinlikler artik oyunda!">
                                </div>
                            </a>
                        </article>
                    @endforeach
                    {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0"
                        viewBox="0 0 1712.6 75" style="enable-background:new 0 0 1712.6 75" xml:space="preserve" class="svg-cord-news1">
                        <style>
                            .st0 {
                                fill: none;
                                stroke: #be8f2d;
                                stroke-width: 3;
                                stroke-miterlimit: 10
                            }
                        </style>
                        <path class="st0"
                            d="m843.5 37.9-19.6 20.3-19.6-20.3 19.6-20.3 19.6 20.3zM908.3 37.9l-19.6 20.3-19.6-20.3 19.6-20.3 19.6 20.3z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="m889.9 37.9-33.6 34.9-33.6-34.9L856.3 3l33.6 34.9zM789 3l-27.5 23h-51.3l-22.8 22.8h-97.7L547.2 3"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="M813.4 28.4 789 3h-83.8l-19.7 19.1H0M888.5 17.5l19.6 20.3-19.6 20.3L869 37.9l19.5-20.4z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0" d="m823.7 17.6 19.6 20.3-19.6 20.3-19.6-20.3 19.6-20.3z"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0"
                            d="m856.1 3 33.6 34.9-33.6 34.9-33.6-34.9L856.1 3zM923.4 3l27.5 23h51.3l22.8 22.8h97.7L1165.2 3"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                        <path class="st0" d="M899.2 28.4 923.7 3h83.8l19.7 19.1h685.4"
                            style="stroke-dashoffset: 0; stroke-dasharray: none;"></path>
                    </svg>--}}
                </section>
            </div>
        @endif
        <!-- latest-news Section End -->

        <!-- Team section Begin-->
        {{-- @include('sections.players') --}}
        <!--Team Section End-->

        <!-- Video Section Begin -->
        @include('sections.live-streams')
        <!-- Video Section End -->

        <!-- Testimony Section Begin -->
        {{-- @include('sections.testimonial') --}}
        <!-- Testimony Section End -->

    </div>
@endsection

@section('javascript')
    <script src="{{ asset('frontend/assets/custom-js/main.js') }}"></script>
@endsection
