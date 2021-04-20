@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    @foreach(User::all() as $user)
                        <h1>{{ $user->name }} {{ $user->surname }}</h1>
                        <h3>{{ $user->email }}</h3>
                        <h5>{{ $user->created_at }}</h5>
                        <h2>Comentaris</h2>
                        @foreach($user->comentaris as $comentari)
                            <h5>{{ $comentari->contingut }}</h5>
                        @endforeach
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<main class="main" role="main">

    <div class="album py-5 bg-light">
        <div class="container">
            <p class="colorcin">HOLA</p>

            <div class="row">
                @foreach(User::all() as $video)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card mb-4 box-shadow">
                        {{-- <a href="{{ action('VideoController@index', ['video' => $video->id]) }}"> --}}
                            <img class="card-img-top" src="{{$video->image}}" alt="Miniatura Vídeo" title="Miniatura Vídeo">
                        {{-- </a> --}}
                        <div class="card-body">
                            
                            {{-- <p class="card-text">
                                <img class="mr-2" style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;" src="../{{ $user->image }}">
                                {{$user->name}}
                            </p>
                            <span class="badge badge-dark">
                                {{$user->created_at}}
                            </span> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</main>
@endsection
