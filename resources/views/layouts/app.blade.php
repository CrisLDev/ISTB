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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <div class="d-flex" id="wrapper">
            @guest
            @else
                <!-- Sidebar -->
                <div class="bg-light border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading">Start Bootstrap </div>
                    <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
                    </div>
                </div>
                <!-- /#sidebar-wrapper -->
            @endguest
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
        
              <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container d-flex justify-content-between">
                    @guest
                    @else
                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                    @endguest
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <img class="w-25 mr-2" src="{{ asset('assets/logo.svg') }}" alt="logo">
                        <h3 class="mb-0">{{ config('app.name', 'Laravel') }}</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar 
                        <ul class="navbar-nav">
    
                        </ul>-->
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav">
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
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            Perfil
                                        </a>
    
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
        
              <div class="container-fluid">
                @if ( session('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <main class="py-4">
                    @yield('content')
                </main>
              </div>
            </div>
            <!-- /#page-content-wrapper -->
        
          </div>
          <!-- /#wrapper -->

        <footer>
            <nav class="navbar fixed-bottom navbar-light bg-light">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img class="w-25 mr-2" src="{{ asset('assets/logo.svg') }}" alt="logo">
                    <h3 class="mb-0">{{ config('app.name', 'Laravel') }}</h3>
                </a>
            </nav>
        </footer>

    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        $(document).ready(function(){
            $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-success").slideUp(500);
            });
        });
    </script>

</body>
</html>
