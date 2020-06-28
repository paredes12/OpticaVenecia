<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OpticaVenecia') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('home') }}">Optica Venecia</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" style="margin-left: 650px;top: 10px;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        @guest
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                            
          </li>
        </ul>        
        @if (Route::has('register'))
         
        @endif
          @else
          
          
              <a id="navbarDropdown" class="nav-link dropdown-toggle admin" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-left: 630px;">
              {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @can('leer usuario')
                <a class="dropdown-item" href="{{ route('adminPermisos') }}">
                  {{ __('Usuario') }}
                </a>                            
              @endcan
              @can('crear usuario')
                <a class="dropdown-item" href="{{ route('crearUsuarioView') }}">
                  {{ __('Crear usuario') }}
                </a>
              @endcan
              @can('crear rol')   
              <a class="dropdown-item" href="{{ route('adminRoles') }}">
                  {{ __('Roles') }}
                </a>    
              @endcan
              @can('crear rol')   
              <a class="dropdown-item" href="{{ route('crearRolView') }}">
                  {{ __('Crear rol') }}
                </a>    
              @endcan
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
           
    
          @endguest
        
    </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
