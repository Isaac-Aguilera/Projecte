@extends('layouts.app')

@stack('styles')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">

@section('content')
<main class="main" role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($videosearch as $video)
                    <div class="col-lg-12 col-md-12 col-sm-12">
        
                        <div class="card mb-4 shadow">
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('video', $video->id) }}">
                                            <img class="miniaturas w-100 card-img-top" src="{{$video->image}}" alt="Miniatura Vídeo"
                                                title="Miniatura Vídeo">
                                        </a>

                                     
    
                                    </div>
                                    <div class="col-6">
                                        <strong><span title="{{$video->title}}">
                                                 @if ( Str::length($video->title) >= 60)
                                                {{ Str::of($video->title)->limit(57, ' ...') }}
    
                                                @else
                                                    {{ $video->title }}
                                                @endif
                                            </span></strong><br><br>
    
                                            <a href="{{ route('user', $video->user->id) }}">
                                                <img class="mr-1"
                                                    style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"
                                                    src="../{{ $video->user->image }}">
                                            </a>
                                        <span class="text-muted">{{$video->user->nick}}</span><br><br>
                                        <span class="text-muted">{{$video->description}}</span><br><br>

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