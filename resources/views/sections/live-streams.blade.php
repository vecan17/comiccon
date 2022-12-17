@if (count($streams) > 0)
    <section class="video-section trans-vivo" style="background-image: url(https://cdn.cloudflare.steamstatic.com/apps/dota2/images/dota_react//blog/bg_repeater.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title text-center" style="color:var(--color-yellow)">Transmisiones en vivo</h3>
                   <!-- <hr class="line-info">-->
                </div>
            </div>
            <div class="row">
                <div class="video-slider owl-carousel">

                    @foreach ($streams as $stream)
                        {{-- <div class="col-lg-3">
                            <div class="video-item set-bg" data-setbg="{{is_null($stream->image)?asset('frontend/assets/img/default.png'):Voyager::image($stream->image)}}">
                                <a href="{{$stream->url}}" class="play-btn video-popup"><img src="{{asset('frontend/assets/img/videos/play.png')}}" alt="video img"></a>
                                <div class="vi-time">{{$stream->status}}</div>
                            </div>
                        </div> --}}

                        <div class="col-lg-3">
                            <div class="card-stream">
                                <div class="lines-stream"></div>
                                <div class="imgBx">
                                    <img
                                        src="{{ is_null($stream->image) ? asset('frontend/assets/img/default.png') : Voyager::image($stream->image) }}" />
                                </div>
                                <div class="contents-stream">
                                    <div class="details-stream">
                                        <h2>
                                            {{ $stream->getTranslatedAttribute('title') }} <br />
                                            <span>{{ Str::words($stream->getTranslatedAttribute('description'), 10) }}</span>
                                        </h2>
                                        <div class="data-stream">
                                            <h3>
                                                Status: <span>{{ $stream->status }}</span>
                                            </h3>
                                        </div>
                                        <div class="actionBtn">
                                            <!-- <button>follow</button>
                                  <button>Message</button>-->
                                            <a href="{{ $stream->url }}">ver ahora</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endif
