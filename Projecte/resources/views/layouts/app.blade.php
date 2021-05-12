<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Goocrux</title>
    <link rel="icon" href="http://example.com/favicon.png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

:root {
  --clr-neon: hsl(113, 99%, 48%);
  --clr-bg: hsl(323 21% 16%);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}
        .neon-button {

  display: inline-block;
  cursor: pointer;
  text-decoration: none;
  color: var(--clr-neon);
  border: var(--clr-neon) 0.125em solid;
  padding: 0.25em 1em;
  border-radius: 0.25em;

  text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;

  box-shadow: inset 0 0 0.5em 0 var(--clr-neon), 0 0 0.5em 0 var(--clr-neon);

  position: relative;
}

.neon-button::before {
  pointer-events: none;
  content: "";
  position: absolute;
  top: 120%;
  left: 0;
  width: 100%;
  height: 100%;

  transform: perspective(1em) rotateX(40deg) scale(1, 0.35);
  filter: blur(1em);
  opacity: 0.7;
}

.neon-button::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  box-shadow: 0 0 2em 0.5em var(--clr-neon);
  opacity: 0;
  background-color: var(--clr-neon);
  z-index: -1;
  transition: opacity 100ms linear;
}



.neon-button:hover::before,
.neon-button:focus::before {
  opacity: 1;
}
.neon-button:hover::after,
.neon-button:focus::after {
  opacity: 1;
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm ">
            <div class="container">
                <a class="navbar-brand neon-button" href="{{ url('/') }}">
                Goocrux
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <form class="d-flex" method="GET" action="{{ route('search') }}">
                            <input class="form-control me-2 col-10 w-100 mt-3" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                            <button class="btn btn-outline-success ml-2 mt-3" type="submit">Search</button>
                          </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <div class="dropdown" style="float: right; padding: 13px">
                            <a href="#" onclick="netejarnoti()" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                <i class="fa fa-bell" style="font-size: 20px; float: left; color: white">
                                </i>
                            </a>
                            <span id="notinumber" class="badge badge-danger">{{ Auth::user()->notificacions->where("state", "=", true)->count() }}</span>
                            <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation" class="mx-auto">
                                    <span class="font-weight-bold ml-3">Notifications</span>
                                </li>
                                <ul class="list-group list-group-flush p-0" style="width: 220px">
                                    @if (Auth::user()->notificacions->where("state", "=", true)->count() < 1)
                                        <p class="ml-3">There are no notifications!</p>
                                    @else
                                        @foreach(Auth::user()->notificacions->where("state", "=", true) as $notifi)
                                            <li class="list-group-item p-0 ml-3 mt-3">
                                                <p>
                                                    {{ $notifi->noti_desc }} 
                                                    <p class="text-muted">{{ \FormatTime::LongTimeFilter($notifi->created_at) }}</p>
                                                </p>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <li role="presentation">
                                    <a href="#" class="dropdown-menu-header"></a>
                                </li>
                            </ul>
                        </div>

                        <ul class="navbar-nav">
                            
                                <li class="nav-item my-auto mr-2">
                                    
                                    <a class="nav-link active" href="{{ route('pujarVideo') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-camera-video-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z"/>
                                    </svg></a>
                                </li>
                                <div class="dropdown">
                                <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="mr-2" style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;" src="../../{{ Auth::User()->image }}">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"  href="{{ route('user', Auth::user()->nick) }}">
                                        Perfil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('config') }}">
                                        Configuració
                                    </a>
                                    <a class="dropdown-item"  href="{{ route('configPassword') }}">
                                        Contrasenya
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
                                </div>
                                  
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


<script type="text/javascript">

    function netejarnoti() {
        $.ajax({
            url: '/netejarnoti',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
            },
            error: function(response){
                alert(response['statusText']);
            },
            success: function(response) {
                
                document.getElementById("notinumber").innerHTML = "0";
            }
        });
    }
</script>
