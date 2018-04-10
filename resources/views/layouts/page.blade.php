<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    @yield('head_scripts')
</head>
<body class="page-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-responsive" src="{{ asset('img/logo.png') }}" alt="logo" />
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}#">Home</a></li>
                    <li><a href="{{ url('/') }}#about-us">About Us</a></li>
                    <li><a href="{{ url('projects') }}">Projects</a></li>
                    <li><a href="{{ url('search') }}">Disability Services Search</a></li>
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        @if (config('app.show_login_button'))
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    @else
                        @if (Route::is('page'))
                            <li><a href="{{ route('page.edit', $page->slug) }}">Edit</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Language <span class="caret"></span></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="?lang=en"><img src="{{ asset('img/english.png') }}" alt="english" style="width: 30px" /> English</a></li>
                            <li><a href="?lang=zh"><img src="{{ asset('img/chinese.png') }}" alt="english" style="width: 30px" /> Chinese</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <section class="page-section connect-page-section mt-0">
        <div class="container">
            <h2 class="page-section-title">Connect With Us</h2>
            <p class="text-center">
                <img src="{{ asset('img/qr.png') }}" alt="qr" />
            </p>
            <p class="connect-info text-center" style="margin-top: 50px;">
                Phone: 02 4274 1090 | Email: info@australianmercy.org | WeChat ID: arms_china_wechat
            </p>
        </div>
    </section>

    <section class="page-section language-page-section">
        <div class="container">
            <p class="text-center">
                <a href=""><img src="{{ asset('img/english.png') }}" alt="english" /> English</a>
                <span> | </span>
                <a href=""><img src="{{ asset('img/chinese.png') }}" alt="english" /> Chinese</a>
            </p>
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
