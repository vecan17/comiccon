<!--Carousel-->

<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">

    <ol class="carousel-indicators">
        @foreach ($Carrusel as $value)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($Carrusel as $value)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ is_null($value->iamge) ? asset('news_images/image.jpg') : asset('storage/' . $value->iamge) }}"
                    class="d-block w-100" alt="...">
                <!--<div class="carousel-caption d-none d-md-block">
                    <h5>{{ $value->title }}</h5>
                </div>-->
            </div>
        @endforeach
    </div>
  <!--  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>-->
</div>

<!--Carousel-->
