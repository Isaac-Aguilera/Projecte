@extends('layouts.app')

@stack('styles')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">

@section('content')
<main class="main" role="main">
        <div class="album py-5 bg-light">
            <div class="container" style="margin-top: 100px;">
                <div class="row">
                    @if($productesearch->count() < 1)
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card mb-4">
                                <h4 class="text-center m-5">Nothing could be found!</h4>
                            </div>
                        </div>
                    @else
                        @foreach($productesearch as $producte)
                        <div class="col-lg-12 col-md-12 col-sm-12">
            
                            <div class="card mb-4 shadow">
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('producte', $producte->id) }}">
                                                <img class="miniaturas w-100 card-img-top" src="/{{ $producte->image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <strong><span title="{{$producte->name}}">
                                                    @if ( Str::length($producte->name) >= 60)
                                                    {{ Str::of($producte->name)->limit(57, ' ...') }}
        
                                                    @else
                                                        {{ $producte->name }}
                                                    @endif
                                                </span></strong><br>
                                            <span class="text-muted" title="{{$producte->description}}">
                                                @if ( Str::length($producte->description) >= 139)
                                                {{ Str::of($producte->description)->limit(136, ' ...') }}

                                                @else
                                                    {{ $producte->description }}
                                                @endif
                                            </span>
                                            
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
</main>
@endsection

<script type="text/javascript" src="{{ asset('js/image.js') }}"></script>