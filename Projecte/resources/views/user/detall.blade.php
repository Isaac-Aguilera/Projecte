@extends('layouts.app')
@stack('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
@section('content')
<main class="main" role="main">
    <div class="container bg-white shadow p-5 rounded">
        @if (isset($error))
        <div class="card">
            <div class="card-header">Error!</div>
            <div class="card-body">
                <p>{{ $error }}</p>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 w-100">
                <a href="{{ route('user', $user->nick) }}">
                    <img class="mr-1" style="border-radius:50%;width:5.5vw;min-width:80px;min-height:80px;"
                        src="../{{ $user->image }}">
                </a>
                <strong><span class="h1 pl-3">{{ $user->nick }}</span></strong>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">VIDEOS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">MORE INFO</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <form class="d-flex justify-content-end" method="GET" action="{{ route('search') }}">
                            <input class="form-control me-2 mt-3" type="search" placeholder="Search" aria-label="Search"
                                id="search" name="search">
                            <button class="btn btn-outline-success ml-2 mt-3" type="submit">Search</button>
                        </form>
                    </ul>
                </nav>
            </div>
        </div>

        @foreach($categorias as $categoria)
            <div class="row bg-light">
                <div class="col-12">

                    @if ($categoria->videos->where('user_id', '=', $user->id)->count() >= 1)
                    <h4 class="ml-3 font-weight-bold">{{ $categoria->name }}</h4>
                    

              
                    <div class="row bg-light">
                            @foreach($categoria->videos->where('user_id', '=', $user->id) as $video)

                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card m-3">
                                <a href="{{ route('video', $video->id) }}">
                                        <video class="miniaturas w-100 card-img-top" src="../{{ $video->video_path }}"
                                        poster="../{{ $video->image }}" onmouseover="bigImg(this)" onmouseout="normalImg(this)" loop
                                        preload="none" muted="muted"></video>
                                </a>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{ route('user', $video->user->nick) }}">
                                                <img class="mr-1"
                                                    style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"
                                                    src="../{{ $video->user->image }}">
                                            </a>
    
                                        </div>
                                        <div class="col-9">
                                            <strong><span title="{{$video->title}}">
                                                @if ( Str::length($video->title) >= 60)
                                                {{ Str::of($video->title)->limit(57, ' ...') }}
    
                                                @else
                                                {{ $video->title }}
                                                @endif
                                            </span></strong><br>
    
    
                                            <span class="text-muted">{{$video->user->nick}}</span><br>
                                            <span class="text-muted">{{$video->views . ' views'}}</span><br>
                                            <span class="text-muted">
                                            {{ \FormatTime::LongTimeFilter($video->created_at) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                            @endforeach
                    </div>
                    <hr>
                </div>

            </div>
            
            @endif
        @endforeach

            @endif
        </div>
    </div>
<main>
@endsection

<script type="text/javascript">
    function bigImg(x) {
        x.autoplay = true;
        x.preload = "auto";
        if(x.readyState == 4) {
            x.play();
        }
    }

    function normalImg(x) {
        x.autoplay = false;
        if(x.readyState == 4) {
            x.pause();
            var v = x.src
            x.src = "";
            x.src = v;
        }    
    }
</script>