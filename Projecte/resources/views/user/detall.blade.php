@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (isset($error))
                <div class="card">
                    <div class="card-header">Error!</div>
                    <div class="card-body">  
                        <p>{{ $error }}</p>
                    </div>
                </div>   
            @else
                <div class="card">
                    <div class="card-header">{{ $user->nick }}</div>
                    <div class="card-body">  
                            <img class="w-100" src="../{{ $user->image }}" alt="User image">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection