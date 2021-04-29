
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <ul class="navbar-nav mr-auto">
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