<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="photosurtoile.ca - Impression de toiles sur mesure."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Impression de toiles sur mesure, téléchargez vous même votre photo et prévisualisez le résultat avant de commander!"/>
    <meta name="keywords" content="Photo,Toile,Impression,Toile sur mesure,Photo sur toile,Photo,Canvas,Giclée,Cadre,Encadrement"/>
    <meta name="author" content="photosurtoile.ca"/>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <meta name="author" content="photosurtoile.ca"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        window.kedl = {
            locale: '{{ app()->getLocale() }}'
        };
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-md top">
        <ul class="navbar-nav contacts">
            <li>
                <span>
                    <i class="fas fa-phone-alt rounded"></i>
                    <a href="tel:4187411100">(418) 741-1100</a></span>
                <span><a href="tel:8665548544">(866) 554-8544</a></span>
            </li>
            <li>
                <i class="fas fa-envelope rounded"></i>
                <a href="contact">info@photosurtoile.ca</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>facebook</li>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/photosurtoire-logo.png" alt="Logo Photosurtoile">
                <span class="d-none">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{ __('pages.homepage') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.contact') }}">{{ __('pages.contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.price') }}">{{ __('pages.price') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://bloguephotosurtoile.ca/">{{ __('pages.blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('page.faq') }}">{{ __('pages.faq') }}</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        {{--
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                         --}}
                    @endguest
                    <li class="nav-item d-none">
                        <a href="locale/fr">Français</a>
                    </li>
                    <li class="nav-item d-none">
                        <a href="locale/en">English</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>



    @yield('javascript')
</body>
</html>
