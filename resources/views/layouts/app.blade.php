<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    @php
                    $type="";
                    if(Auth::user() != null)
                    $type = Auth::user()->type;
                    @endphp
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                                @if (Auth::user()->type == 'secretaria' || Auth::user()->type == 'administrador')
                                    @if (Auth::user()->type == 'secretaria')
                                        {{ __('Secretaria') }}
                                    @else
                                        {{ __('Administrador') }}
                                    @endif
                                @endif

                                @if (Auth::user()->type == 'aluno')
                                    {{__(Auth::user()->aluno->nome)}}
                                @endif

                                @if (Auth::user()->type == 'professor')
                                    {{__(Auth::user()->professor->nome)}}
                                @endif
                            </a>

                            <ul class="dropdown-menu">

                                @if ($type == 'secretaria' || $type == 'administrador')
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Cadastrar Usuário') }}</a>
                                </li>
                                @endif

                                @if ($type == 'aluno')
                                <li>
                                    <a class="dropdown-item" href="{{ route('aluno.edit', Auth::user()->id) }}">
                                        {{ __('Atualizar Dados') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('change-password', Auth::user()->id) }}">
                                        {{ __('Troca de Senha') }}
                                    </a>
                                </li>
                                @endif

                                @if ($type == 'professor')
                                <li>
                                    <a class="dropdown-item" href="{{ route('professor.change-password', Auth::user()->id) }}">
                                        {{ __('Troca de Senha') }}
                                    </a>
                                </li>

                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                </li>
                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            @yield('menu')
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>