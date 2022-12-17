<div class="container">
    <section class="latest-news">
        <div class="latest-news-title">
            <h5 style="color:var(--color-yellow)">Torneos e-sport</h5>
        </div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 1712.6 75"
            style="enable-background:new 0 0 1712.6 75" xml:space="preserve" class="svg-cord-sport0">
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


        @if (count($Game) > 0)
            <div class="row mt-5 justify-content-center">
                @foreach ($Game as $value)
                    <div class="col-lg-4 col-md-6 mt-5 card-center">

                        <div class="card-game">
                            <div class="poster-game">
                                <video width="100%" autoplay="" muted="" loop="">
                                    <source
                                        src="{{ is_null($value->video) ? asset('storage/video/teams.mp4') : asset('storage/video') . '/' . $value->video }} "
                                        type="video/mp4">
                                </video>
                            </div>
                            <div class="details-game">
                                <img src="{{ is_null($value->logo) ? asset('frontend/assets/img/default.png') : Voyager::image($value->logo) }}"
                                    class="logo-teams">
                                <div class="tags-teams">
                                    <span>Creado</span>
                                    <span>{{ date('Y F d', strtotime($value->created_at)) }}</span>
                                </div>
                                <div class="info-teams">
                                    <p>{!! clean(Str::words($value->getTranslatedAttribute('description'), 50)) !!}</p>

                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
      {{--  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 1712.6 75"
        style="enable-background:new 0 0 1712.6 75" xml:space="preserve" class="svg-cord-sport1 ">
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
