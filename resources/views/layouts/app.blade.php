<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary  navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else




                         <!--Mis links para navegar--->
                         <li class="nav-item active">
                            <a class="nav-link" href="{{route('next')}} ">Crear</a>
                        </li>

                        <!--*************************************Link de invitaciones***********************************-->
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Invitaciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Registrar invitaciones-->
                              <a class="dropdown-item" href="{{url('registroinvitacion')}}">Registrar invitaciones</a>
                              <a class="dropdown-item" href=" {{route('Tinvitaciones')}} ">Ver invitaciones</a>
                          </li>

                         <!--***********************************Links de invitados ******************************-->
                        <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Invitados
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="registroinvitado">Registrar invitados</a>
                                  <a class="dropdown-item" href=" {{route('Tinvitados')}} ">Ver invitados</a>
                              </li>


                            <li class="nav-item dropdown active">
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

        {{--Cuerpo principal--}}
        <main class="py-4">
            {{--Contenido de la página home--}}
            @yield('content')
            {{--Contenido de la página MuestraInvitaciones--}}
            @yield('Muestrainvitacion')
            {{--Contenido de la página MuestraInvitados--}}
            @yield('Muestrainvitados')
            {{--Contenido de la página RegistrarInvitacion--}}
            @yield('Registrainvitacion')
            {{--Contenido de la página RegistrarInvitados--}}
            @yield('Registrarinvitado')
            {{--Contenido de la página SelecInvitacion--}}
            @yield('SelecInvitacion')
            {{--Contenido de la página SelecInvitado--}}
            @yield('SelecInvitado')
            @yield('pdf')

        </main>
    </div>
</body>
</html>
