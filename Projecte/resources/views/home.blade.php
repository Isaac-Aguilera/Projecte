@extends('layouts.app')
@stack('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">


@section('content')
 
<main class="main" role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach(Video::orderBy('created_at','DESC')->get() as $video)
                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="card mb-4 shadow">
                        <a href="{{ route('video', $video->id) }}">
                            <img class="miniaturas w-100 card-img-top" src="{{$video->image}}" alt="Miniatura Vídeo"
                                title="Miniatura Vídeo">
                        </a>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <a href="{{ route('user', $video->user->id) }}">
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
                                    <span class="badge badge-dark">
                                        {{$video->created_at}}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</main>
@endsection