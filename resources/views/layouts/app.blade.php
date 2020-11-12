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

        <div class="wrapper">
            @guest
            @else
            <!-- Sidebar  -->
        <nav id="sidebar" class="bg-light text-dark">

            <div class="sidebar-header pb-0 d-flex align-items-baseline">
                <h3>Gestión</h3>
                <h3 class="ml-1">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                      </svg>
                </h3>
                  <h3 class="mb-0 ml-auto" id="dismiss">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
                      </svg>
                </h3>
            </div>

            <ul class="list-unstyled components">
                <p class="text-dark">Dummy Heading</p>
                <li class="active">
                    <a href="{{ route('user.index') }}">Usuarios</a>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Registrar</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('people.index') }}">Todo</a>
                        </li>
                        <li>
                            <a href="{{ route('people.createAdmin') }}">Administración</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
            @endguest
            <!-- Page Content -->
            <div id="content">
        
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container d-flex justify-content-between">
                    @guest
                    @else
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-align-left"></i>
                        <span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                          </svg></span>
                    </button>
                    @endguest
                    <a class="navbar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                        <img class="w-25 mr-2" src="{{ asset('assets/logo.svg') }}" alt="logo">
                        <h3 class="mb-0">{{ config('app.name', 'Laravel') }}</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
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

                @if ( session('messageError') )
                    <div class="alert alert-danger">{{ session('messageError') }}</div>
                @endif

                <main class="py-4">
                    @yield('content')
                </main>
              </div>
            </div>
            <!-- /#page-content-wrapper -->
        
          </div>
          <!-- /#wrapper -->
            </div>
        </div>

        
              

        <footer>
            <nav class="navbar fixed-bottom navbar-light bg-light border-top">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img class="w-25 mr-2" src="{{ asset('assets/logo.svg') }}" alt="logo">
                    <h3 class="mb-0">{{ config('app.name', 'Laravel') }}</h3>
                </a>
            </nav>
        </footer>

    </div>

    <div class="overlay"></div>
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

        $(document).ready(function(){
            $(".alert-danger").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-danger").slideUp(500);
            });
        });

        $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
    </script>

</body>
</html>
