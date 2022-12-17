@extends('layouts.app')

@section('title', 'Players')

@section('content')
   <!-- <div class="page-header page-header-small">
        <div class="page-header-image" style="background-image: url('{{ asset('frontend/assets/img/header-bg.jpg') }}');">
        </div>
        <div class="content-center">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h1 class="title">{{ __('players.page-title') }}</h1>
                </div>
            </div>
        </div>
    </div>-->

<div class="header-title-player">
    <h1>{{ __('players.page-title') }}</h1>
</div>

    <!-- player info part start-->
    <section class="team_member mt-5 mb-5">
        <div class="container">
            <div class="row">
                @foreach ($players as $player)
                <div class="card-new">
                    <div class="card-header-new"
                  style="background-image: url({{is_null($player->image)?asset('frontend/assets/img/default.png'):Voyager::image($player->image)}})"
                    >
                      <div class="card-header-slanted-edge">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 200"><path class="polygon" d="M-20,200,1000,0V200Z" /></svg>
                          </div>
                    </div>

                    <div class="card-body">
                        <h2 class="name">{{$player->getTranslatedAttribute('name')}}</h2>
                        <h4 class="job-title">Pais: {{$player->country}}</h4>
                        <div class="bio">Edad: {{$player->age}}</div>
                        <div class="social-accounts">
                          <a href="//{{$player->facebook_url}}"><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
                          <a href="//{{$player->twitter_url}}"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
                          <a href="//{{$player->youtube_url}}"><i class="fab fa-youtube"></i><span class="sr-only">youtube</span></a>
                          <a href="//{{$player->twitch_url}}"><i class="fab fa-twitch"></i><span class="sr-only">twitch</span></a>
                        </div>
                    </div>

                    <div class="card-footer-new">
                        <div class="stats">
                            <div class="stat">
                              <span class="label">Juegos</span>
                              <span class="value">{{$player->total_game}}</span>
                            </div>
                            <div class="stat">
                              <span class="label">victorias</span>
                              <span class="value">{{$player->wins}}</span>
                            </div>
                            <div class="stat">
                              <span class="label">Derrotas</span>
                              <span class="value">{{$player->loses}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    {{ $players->links() }}
                </div>
            </div>
        </div>
    </section>

    <!--Testimonial-->
    @include('sections.testimonial')

@endSection
