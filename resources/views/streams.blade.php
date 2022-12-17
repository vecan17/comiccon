@extends('layouts.app')

@section('title', 'Streams')

@section('content')


  <div class="header-title-player">
    <h1>{{ __('streams.page-title') }}</h1>
</div>

  <div class="main main-raised mt-5 mb-5">
    <div class="container">
      @if(count($streams)>0)
        <div class="row mt-5">
          @foreach($streams as $stream)

            <div class="col-lg-4 col-md-6 mt-5 card-center">
              <div class="card-stream">
                <div class="lines-stream"></div>
                <div class="imgBx">
                  <img src="{{is_null($stream->image)? asset('frontend/assets/img/default.png') :Voyager::image($stream->image)}}" />
                </div>
                <div class="contents-stream">
                  <div class="details-stream">
                    <h2>
                      {{$stream->getTranslatedAttribute('title')}} <br />
                      <span>{{Str::words($stream->getTranslatedAttribute('description'),10)}}</span>
                    </h2>
                    <div class="data-stream">
                      <h3>
                        Status: <span>{{$stream->status}}</span>
                      </h3>
                    </div>
                    <div class="actionBtn">
                     <!-- <button>follow</button>
                      <button>Message</button>-->
                      <a href="{{$stream->url}}">ver ahora</a>
                    </div>
                  </div>
                </div>
              </div>



            </div>



          @endforeach
        </div>
      @else
        No items to show
      @endif
    </div>

    <div class="container mt-5">
      <div class="row justify-content-center">
        {{$streams->links()}}
      </div>
    </div>

  </div>


@endsection
