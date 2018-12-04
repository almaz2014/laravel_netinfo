<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Netinfo') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.3.1.js') }}" ></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.js') }}" ></script>
    <!-- Fonts -->

    <!-- Styles -->

</head>
<body>

        <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Netinfo') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Journal
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/journal')  }}">Journal lists</a>
                                    <a class="dropdown-item" href="{{ url('/journal/create') }}">Add Journal item</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Ports
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/port')  }}">Ports lists</a>
                                    <a class="dropdown-item" href="{{ url('/port/create') }}">Add port</a>

                                </div>
                            </li>
                        <!-- Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Netdev
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/netdev')  }}">Netdev lists</a>
                                    <a class="dropdown-item" href="{{ url('/netdev/create') }}">Add Netdev</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Location
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/loc')  }}">List Locations</a>
                                    <a class="dropdown-item" href="{{ url('/loc/create') }}">Add Location</a>
                                    <a class="dropdown-item" href="#">Link 3</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>



                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<br>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>

</body>
</html>
