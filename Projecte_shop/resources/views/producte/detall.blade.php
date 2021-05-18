@extends('layouts.app')
@stack('styles')
<link href="{{ asset('css/detallProducte.css') }}" rel="stylesheet">

@section('content')
<div id="container" class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-8 col-xs-12 mb-3">
            @if (isset($error))
                <div class="card">
                    <div class="card-header">Error!</div>
                    <div class="card-body">  
                        <p>{{ $error }}</p>
                    </div>
                </div>   
            @else
                <div class="card shadow">
                  <div class="poster">
                    <img class="miniaturas w-100 card-img-top" src="/{{ $producte->image }}" alt="">
                  </div>

                    <div class="card-body">  
                        
                        <h4 class="card-title font-weight-bolder">{{ $producte->name }}</h4>
                        <div class="row">
                            <div class="col-12">
                                <p class="mt-2">{{  $producte->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection