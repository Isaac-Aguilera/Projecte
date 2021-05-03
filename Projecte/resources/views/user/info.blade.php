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
    
        @include('layouts.users')
        @section('user-content')
        @stop
        @endif
        <div class="row bg-light">
            <div class="col-8"> 
                <p class="font-weight-bold">Description</p>
                <hr>
                <span>{{ $user->channel_desc }}</span>
            </div>
            <div class="col-4 ">
                <p class="font-weight-bold">Stats</p>
                <hr>
                <span>Joined {{ Str::limit($user->created_at, 10, '') }}</span>
                <hr>   
                <span>
                    {{ $user->videos->sum('views') }} views
                </span>
            </div>
        </div>
    </div>
</main>
@endsection
