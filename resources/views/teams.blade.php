@extends('layouts.app')

@section('title', 'Teams')

@section('content')
    <div class="profile-page">
        <div class="slider">
            <video width="100%" autoplay="" muted="" loop="" id="rise_online_video">
                <source src="{{ asset('storage/video/equipo2.mp4') }}" type="video/mp4">
            </video>
            <div class="container">
                <div class="slider-inner flex-slide">
                    <div class="slide-left">
                        <h1>
                            Equipos </h1>
                        <p>Podras Seguir el progreso de cada equipo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($teams) > 0)

        <div class="section team-img">
            <div class="container">
                <div class="row mt-5">
                    @foreach ($teams as $team)
                        <div class="col-lg-4 col-md-6 mt-5 card-center">

                            <div class="card-teams">
                                <div class="poster-teams">
                                    <video width="100%" autoplay="" muted="" loop="">
                                        <source src="{{ asset('storage/video/teams.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="details-teams">
                                    <img src="{{ is_null($team->logo) ? asset('frontend/assets/img/default.png') : Voyager::image($team->logo) }}"
                                        class="logo-teams">
                                    <h3>{{ $team->getTranslatedAttribute('title') }}</h3>
                                    <div class="tags-teams">
                                        <span>Creado</span>
                                        <span>{{ date('d F,Y', strtotime($team->founding_date)) }}</span>
                                    </div>
                                    <div class="info-teams">
                                        <p>{!! clean(Str::words($team->getTranslatedAttribute('about'), 10)) !!}</p>

                                    </div>
                                    <div class="cast-teams">
                                        <h4>Equipo</h4>
                                        <ul>
                                            <?php $count = 0; ?>
                                            @foreach ($team->players as $player)
                                                <?php if ($count == 5) {
                                                    break;
                                                } ?>
                                                <li> <img class="teams-player-img img-fluid rounded-circle"
                                                        src="{{ is_null($player->image) ? asset('frontend/assets/img/default.png') : Voyager::image($player->image) }}">
                                                </li>
                                                <?php $count++; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="actionBtn">
                                        <!-- <button>follow</button>
                           <button>Message</button>-->
                                        <a href="/team/{{ $team->slug }}">ver ahora</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-center mt-5">
                    {{ $teams->links() }}
                </div>

            </div>
        </div>
    @endif

@endsection
