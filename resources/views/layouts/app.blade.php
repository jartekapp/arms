<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/css/plugins/colors.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/css/plugins/code_view.min.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                        <img src="{{ asset('img/logo.png') }}" alt="logo" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Route::is('home.edit') || (isset($page) && 'home' === $page->slug))
                            <li><a href="/">Cancel editing</a></li>
                        @elseif (Route::is('page.edit'))
                            <li><a href="{{ route('page', $page->slug) }}">Cancel editing</a></li>
                        @endif
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Pages <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach (App\Page::all() as $page)
                                        <li><a href="{{ route('page.edit', $page->slug) }}">{{ $page->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
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
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/froala_editor.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/plugins/paragraph_format.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/plugins/align.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/plugins/colors.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/plugins/code_view.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.4/js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript">
         $(function() {
            $('.wysiwyg').froalaEditor({
                key: '{{ config('services.froala.key') }}',
                toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'color', '|', 'paragraphFormat', 'align', 'undo', 'redo', 'html'],
            })
        });
    </script>
</body>
</html>
