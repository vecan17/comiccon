@extends('layouts.app')

@section('title', 'Team ' . $team->getTranslatedAttribute('title'))

@section('content')

    <div class="profile-page">

        <div class="slider">
            <video width="100%" autoplay="" muted="" loop="" id="rise_online_video">
                <source src="{{ asset('storage/video/equipo.mp4') }}" type="video/mp4">
            </video>
            <div class="container">
                <div class="slider-inner flex-slide">
                    <div class="slide-left">
                        <h1>
                            {{ $team->getTranslatedAttribute('title') }} </h1>
                        <p>
                            {{ date('d F,Y', strtotime($team->founding_date)) }} </p>
                        <!--<div class="button-wrap">
                            <a href="https://www.riseonlineworld.com/en/register" class="rise-btn active">REGISTER</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>




        <div class="section">
            <div class="container">
                <img class="img-fluid img-center" src="{{ is_null($team->logo) ? asset('frontend/assets/img/default.png') : Voyager::image($team->logo) }}" alt="team logo">
                    <div class="row mb-5">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            {!! clean($team->getTranslatedAttribute('about')) !!}
                        </div>
                    </div>
                    <div class="stats row mb-5 text-center align-items-center d-flex justify-content-center">
                        <div class="col-sm-2">
                            <p class="stats-details text-yellow">{{ $team->getTranslatedAttribute('total_game') }}</p>
                            <p>Juegos</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="stats-details text-yellow">{{ $team->getTranslatedAttribute('wins') }}</p>
                            <p>Victorias</p>
                        </div>
                        <div class="col-sm-2">
                            <p class="stats-details text-yellow">{{ $team->getTranslatedAttribute('loses') }}</p>
                            <p>Derrotas</p>
                        </div>
                    </div>
            </div>

            <div class="align-items-center d-flex justify-content-center mb-5">
                @if (count($team->players) > 0)
                    <div class="container">
                        <div class="align-items-center d-flex justify-content-center">
                            <h2 class="title mb-5">Conoce a nuestros jugadores</h2>
                        </div>
                        <div class="row">
                            @foreach ($team->players as $player)
                                <div class="card-new">
                                    <div class="card-header-new"
                                        style="background-image: url({{ is_null($player->image) ? asset('frontend/assets/img/default.png') : Voyager::image($player->image) }})">
                                        <div class="card-header-slanted-edge">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200">
                                                <path class="polygon" d="M-20,200,1000,0V200Z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h2 class="name">{{ $player->getTranslatedAttribute('name') }}</h2>
                                        <h4 class="job-title">Pais: {{ $player->country }}</h4>
                                        <div class="bio">Edad: {{ $player->age }}</div>
                                        <div class="social-accounts">
                                            <a href="//{{ $player->facebook_url }}"><i class="fab fa-facebook"></i><span
                                                    class="sr-only">Facebook</span></a>
                                            <a href="//{{ $player->twitter_url }}"><i class="fab fa-twitter"></i><span
                                                    class="sr-only">Twitter</span></a>
                                            <a href="//{{ $player->youtube_url }}"><i class="fab fa-youtube"></i><span
                                                    class="sr-only">youtube</span></a>
                                            <a href="//{{ $player->twitch_url }}"><i class="fab fa-twitch"></i><span
                                                    class="sr-only">twitch</span></a>
                                        </div>
                                    </div>

                                    <div class="card-footer-new">
                                        <div class="stats">
                                            <div class="stat">
                                                <span class="label">Juegos</span>
                                                <span class="value">{{ $player->total_game }}</span>
                                            </div>
                                            <div class="stat">
                                                <span class="label">victorias</span>
                                                <span class="value">{{ $player->wins }}</span>
                                            </div>
                                            <div class="stat">
                                                <span class="label">Derrotas</span>
                                                <span class="value">{{ $player->loses }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

@endsection
