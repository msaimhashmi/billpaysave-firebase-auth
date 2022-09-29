<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/admin/assets/images/logo.png">

    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/admin/assets/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="/admin/assets/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="/admin/assets/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="/admin/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/admin/assets/material-design-icons/material-design-icons.css" type="text/css" />

    <link rel="stylesheet" href="/admin/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <!-- build:css /admin/assets/styles/app.min.css -->
    <link rel="stylesheet" href="/admin/assets/styles/app.css" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="/admin/assets/styles/font.css" type="text/css" />
</head>

<body>
    <div class="app" id="app">
      <!-- ############ LAYOUT START-->
      @yield('content')
      <!-- ############ LAYOUT END-->
    </div>
    <!-- build:js /admin/scripts/app.html.js -->
    <!-- jQuery -->
    <script src="/admin/libs/jquery/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/libs/jquery/tether/dist/js/tether.min.js"></script>
    <script src="/admin/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    <!-- core -->
    <script src="/admin/libs/jquery/underscore/underscore-min.js"></script>
    <script src="/admin/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="/admin/libs/jquery/PACE/pace.min.js"></script>
    <script src="/admin/scripts/config.lazyload.js"></script>
    <script src="/admin/scripts/palette.js"></script>
    <script src="/admin/scripts/ui-load.js"></script>
    <script src="/admin/scripts/ui-jp.js"></script>
    <script src="/admin/scripts/ui-include.js"></script>
    <script src="/admin/scripts/ui-device.js"></script>
    <script src="/admin/scripts/ui-form.js"></script>
    <script src="/admin/scripts/ui-nav.js"></script>
    <script src="/admin/scripts/ui-screenfull.js"></script>
    <script src="/admin/scripts/ui-scroll-to.js"></script>
    <script src="/admin/scripts/ui-toggle-class.js"></script>
    <script src="/admin/scripts/app.js"></script>
    <!-- ajax -->
    <script src="/admin/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
    <script src="/admin/scripts/ajax.js"></script>
    <!-- endbuild -->
  </body>
{{-- <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body> --}}
</html>
