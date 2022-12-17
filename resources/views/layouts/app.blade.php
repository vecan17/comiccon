<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('meta-tags')
    <title>{{ is_null(setting('site.title')) ? '' : setting('site.title') . '-' }}@yield('title')</title>

    <link rel="shortcut icon" type="image"
        href="{{ is_null(setting('site.logo')) ? '' : Storage::url(setting('site.logo')) }}">


    <!--boostrarp 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('frontend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('frontend/assets/css/blk-design-system.css') }}" rel="stylesheet" />

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!-- popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/custom-css/custom.css') }}">


    @yield('css')

</head>

<body class="@yield('body-class')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent shift" color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/">
                    <img class="logo-link" src="{{ asset('storage') . '/' . setting('site.logo') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a>

                                <img class="logo-link" src="{{ asset('storage') . '/' . setting('site.logo') }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-6 collapse-close text-right">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav">
                    {{ menu('header_menu', 'partials.header-menu') }}

                    <?php $languages = explode(',', env('LANGUAGES', 'en')); ?>

                    @if (!is_null(setting('site.lang_switch')) && setting('site.lang_switch') == 1)
                        <select class="langSelect">
                            @foreach ($languages as $language)
                                <option value="{{ $language }}" @if (session()->get('locale') == $language) selected @endif>
                                    {{ $language }}</option>
                            @endforeach
                        </select>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="wrapper">

        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--<h1 class="title">{{ is_null(setting('site.title')) ? 'eSports' : setting('site.title') }}</h1>-->
                    <img class="logo-link" src="{{ asset('storage') . '/' . setting('site.logo') }}"
                        alt="">
                </div>
                <div class="col-md-3">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                INICIO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/posts" class="nav-link">
                                NOTICAS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teams" class="nav-link">
                                EQUIPOS
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="nav">
                        {{ menu('footer_menu', 'partials.footer-menu') }}
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <h3>Redes sociales</h3>
                        <div class="btn-wrapper profile">
                            <a target="_blank" href="//{{ setting('social.twitter') }}"
                                class="btn btn-icon btn-neutral btn-round btn-simple">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a target="_blank" href="//{{ setting('social.facebook') }}"
                                class="btn btn-icon btn-neutral btn-round btn-simple">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a target="_blank" href="//{{ setting('social.youtube') }}"
                                class="btn btn-icon btn-neutral  btn-round btn-simple">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a target="_blank" href="//{{ setting('social.twitch') }}"
                                class="btn btn-icon btn-neutral  btn-round btn-simple">
                                <i class="fab fa-twitch"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('frontend/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Control Center for parallax effects -->
    <script src="{{ asset('frontend/assets/js/blk-design-system.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/custom-js/main.js') }}"></script>


    @yield('javascript')
</body>

</html>
