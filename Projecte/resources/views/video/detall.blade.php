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
                    <div class="card-header">{{ $video->title }}
                    </div>
                    <div class="card-body">  
                        <video class="w-100" poster="../{{ $video->image }}" controls>
                            <source src="../{{ $video->video_path }}">
                        </video>
                        @if (Auth::user()) 
                            @php
                                $vot = $video->vots->where('user_id', '=', Auth::user()->id)->first() 
                            @endphp 
                            @if(isset($vot))
                                @if($vot->votacio == 1)
                                    <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up-fill" onclick="like({{ $video->id }}, 'like')"></i>
                                    <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                    <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike')"></i>
                                    <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                                @else
                                    <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up"  onclick="like({{ $video->id }}, 'like')"></i>
                                    <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                    <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down-fill" onclick="like({{ $video->id }}, 'dislike')"></i>
                                    <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                                @endif
                            @else
                                <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up" onclick="like({{ $video->id }}, 'like')"></i>
                                <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike')"></i>
                                <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                            @endif
                        @else
                            <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up" onclick="like({{ $video->id }}, 'like')"></i>
                            <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                            <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike')"></i>
                            <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                        @endif
                        
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="card-body">
                        <h3>Comentaris</h3>
                        <br>
                        @if ($video->comentaris->count() == 0)
                            <h5>No hi han comentaris!</h5>
                        @else
                            @foreach ($video->comentaris as $comentari)
                                <h5>{{ $comentari->user->nick }} </h5>
                                <p>{{ $comentari->contingut }}</p>
                                <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function like(id,votacio) {
        if (votacio == 'like') {
            if (document.getElementById("like_"+id).className == "bi bi-hand-thumbs-up") {
                $.ajax({
                    url: '../vot',
                    method: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'votacio': votacio
                    },
                    error: function(response){
                        //alert(response['statusText']);
                        alert("Has de fer login per a poder votar!");
                    },
                    success: function(response) {
                        document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                        document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down";
                        document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                        document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up-fill";
                    }
                });
            } else {
                $.ajax({
                    url: '../vot',
                    method: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id 
                    },
                    error: function(response){
                        //alert(response['statusText']);
                        alert("Has de fer login per a poder votar!");
                    },
                    success: function(response){
                        document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                        document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up";
                    }
                });
            }
        } else {
            if (document.getElementById("dislike_"+id).className == "bi bi-hand-thumbs-down") {
                $.ajax({
                    url: '../vot',
                    method: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'votacio': votacio
                    },
                    error: function(response){
                        //alert(response['statusText']);
                        alert("Has de fer login per a poder votar!");
                    },
                    success: function(response) {
                        document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                        document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up";
                        document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                        document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down-fill";
                    }
                });
            } else {
                $.ajax({
                    url: '../vot',
                    method: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    error: function(response){
                        //alert(response['statusText']);
                        alert("Has de fer login per a poder votar!");
                    },
                    success: function(response){
                        document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                        document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down";
                    }
                });
            }
        }
    }
</script>