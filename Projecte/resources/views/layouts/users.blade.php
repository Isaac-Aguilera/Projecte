@stack('styles')
<link href="{{ asset('css/users.css') }}" rel="stylesheet">

<div class="row">
    <div class="col-12 p-0 mb-3 position-relative">
        <img class="banner w-100" src="/{{ $user->banner }}">
        <button class="btn btn-light position-absolute fixed-top" style="border-radius: 0;"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>
    </div>
</div>
@if(Auth::user()->id == $user->id)
        <div class="row">
            <div class="col-8">
                <a href="{{ route('user', $user->nick) }}">
                    <img class="mr-1" style="border-radius:50%;width:5.5vw;min-width:80px;min-height:80px;"
                        src="/{{ $user->image }}">
                </a>
                <strong><span class="h1 pl-3 fw">{{ $user->nick }}</span></strong>
            </div>

            <div class="col-4 mt-3 ">
                    <a href="{{ route('pujarVideo') }}"><button class="btn btn-outline-dark">UPLOAD</button></a>
                
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          CONFIG
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('config') }}">CONFIG PROFILE</a>
                          <a class="dropdown-item" href="{{ route('configPassword') }}">CHANGE PASSWORD</a>
                      </div>
                    </div>
            </div>   
        </div>
        @else

        <div class="row">
            <div class="col-12 w-100">
                <a href="{{ route('user', $user->nick) }}"> 
                    <img class="mr-1" style="border-radius:50%;width:5.5vw;min-width:80px;min-height:80px;"
                        src="../../{{ $user->image }}">
                </a>
                <strong><span class="h1 pl-3">{{ $user->nick }}</span></strong>
            </div>
        </div>
        @endif

<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <ul class="navbar-nav  mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user', [$user->nick]) }}">PROFILE</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('uservid', [$user->nick]) }}">VIDEOS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('userinfo', [$user->nick]) }}">MORE INFO</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="d-flex justify-content-end" method="GET" action="{{ route('usersearch', $user->nick) }}">
                    <input class="form-control me-2 mt-3" type="search" placeholder="Search" aria-label="Search"
                        id="search" name="search">
                    <button class="btn btn-outline-success ml-2 mt-3" type="submit">Search</button>
                </form>
            </ul>
        </nav>
    </div>
</div>

<main>
    @yield('user-content')
</main>