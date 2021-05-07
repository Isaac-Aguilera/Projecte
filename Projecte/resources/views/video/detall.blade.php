@extends('layouts.app')
<style>
	.checked {
		color: orange;
	}
    .perma {
		color: orange;
	}
</style>
@section('content')
<script src="{{ asset('js/detall.js') }}"></script>
<div class="container">
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
                    <video class="w-100" poster="../{{ $video->image }}" controls>
                        <source src="../{{ $video->video_path }}">
                    </video>
                    <div class="card-body">  
                        
                        <h4 class="card-title font-weight-bolder">{{ $video->title }}</h4>
                        <div class="row">
                            <div class="col-10">
                                <p class="card-text">{{ $video->views }} views · Release date: {{ Str::limit($video->created_at, 10, '') }}</p>
                                <a href="{{ route('user', $video->user->nick) }}">
                                    <img class="mr-1"
                                        style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"
                                        src="../{{ $video->user->image }}">
                                </a>
                                <span class="font-weight-bold">{{ $video->user->nick }}</span>
                                <p class="mt-2">{{  $video->description }}</p>
                            </div>
                            <div class="col-2">
                                @if (Auth::user()) 
                                @php
                                    $vot = $video->vots->where('user_id', '=', Auth::user()->id)->first() 
                                @endphp 
                                @if(isset($vot))
                                    @if($vot->votacio == 1)
                                        <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up-fill" onclick="like({{ $video->id }}, 'like', '{{ csrf_token() }}')"></i>
                                        <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                        <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike', '{{ csrf_token() }}')"></i>
                                        <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                                    @else
                                        <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up"  onclick="like({{ $video->id }}, 'like', '{{ csrf_token() }}')"></i>
                                        <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                        <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down-fill" onclick="like({{ $video->id }}, 'dislike', '{{ csrf_token() }}')"></i>
                                        <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                                    @endif
                                @else
                                    <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up" onclick="like({{ $video->id }}, 'like', '{{ csrf_token() }}')"></i>
                                    <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                    <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike', '{{ csrf_token() }}')"></i>
                                    <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                                @endif
                            @else
                                <i id="like_{{ $video->id }}" class="bi bi-hand-thumbs-up" onclick="like({{ $video->id }}, 'like', '{{ csrf_token() }}')"></i>
                                <span id="like_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', true)->count() }}</span>
                                <i id="dislike_{{ $video->id }}" class="bi bi-hand-thumbs-down" onclick="like({{ $video->id }}, 'dislike', '{{ csrf_token() }}')"></i>
                                <span id="dislike_{{ $video->id }}_count">{{ $video->vots->where('votacio', '=', false)->count() }}</span>
                            @endif
    
                            @php
                                $mitjanes = array();
                                foreach($valoracions as $nom => $name) {
                                    $contador = 0;
                                    $suma = 0;
                                    foreach($name as $id => $valoracio) {
                                        $contador = $contador + 1;
                                        $suma = $suma + $valoracio['valoracio'];
                                    }
                                    $mitjanes[$nom] = $suma / $contador;
                                }
                            @endphp 
                            </div>
                        </div>
                    </div>
                        <hr>
                    <div class="card-body">
                        <h3>Comentaris</h3>
                        <br>
                        <div id="comentaris">
                            @if ($video->comentaris->count() == 0)
                                <h5>No hi han comentaris!</h5>
                                <hr>
                            @else
                                @foreach ($video->comentaris as $comentari)
                                    <div id={{ $comentari->id }}>
                                        <a href="{{ route('user', $comentari->user->nick) }}">
                                            <img class="mr-1"
                                                style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"
                                                src="/{{ $comentari->user->image }}">
                                        </a>
                                        <span class="font-weight-bold">{{ $comentari->user->nick }}</span>
                                        
                                        @if(Auth::user() !== null) 
                                            @if($comentari->user_id === Auth::user()->id || $comentari->video->user->id === Auth::user()->id)
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </b utton>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button onclick="editarComentari({{ $comentari->id }}, '{{ csrf_token() }}')" class="dropdown-item" >Editar</button>
                                                    <button onclick="eliminarComentari({{ $comentari->id }}, '{{ csrf_token() }}')" class="dropdown-item" >Eliminar</button>
                                                </div>
                                              </div>
                                            @endif
                                        @endif

                                        <p class="mt-2 ml-5">{{ $comentari->contingut }}</p>

                                        <hr>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                            <textarea placeholder="Write a comment!" name="contingut" id="contingut" class="form-control" rows="5"></textarea>
                            <button onclick="afegirComentari({{ $video->id }}, '{{ csrf_token() }}')" class="btn btn-large btn-block btn-primary mt-3" type="submit">Enviar</button>
                            
                        </div>
                </div>
            @endif
        </div>
        <div class="col-lg-4 col-xs-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title font-weight-bolder text-center">Video quality</h4>
                    <h5 id=video>{{ isset($mitjanes['video']) ? $mitjanes['video'] : '' }}</h5>
                    @for ($i = 1; $i < 6; $i++)
                        <button class="fa fa-star pl-0" onmouseover="cmbst('video',{{ $i }})"
                        onmouseout="cmbst2('video',{{ $i }})" id={{ 'video'.$i }} value={{ $i }}
                        style="background-color: white; border:0;" onclick="valorar('video',{{ $i }},{{ $video->id }}, '{{ csrf_token() }}')"></button>
                    @endfor
                    @php
                        if(Auth::user() !== null) {
                            $valoracio = $video->valoracions->where('user_id', '=', Auth::user()->id)->where('name', '=', 'video')->first();
                            if(isset($valoracio)) {
                                echo '<script type="text/javascript">
                                    perma("video",'.$valoracio->valoracio.');
                                </script>';
                            }
                        }
                    @endphp
                </div>
            </div>
    
            <div class="card shadow mt-2">
                <div class="card-body">
                    <h4 class="card-title font-weight-bolder text-center">Audio quality</h4>
                    <h5 id=audio>{{ isset($mitjanes['audio']) ? $mitjanes['audio'] : '' }}</h5>
                    @for ($i = 1; $i < 6; $i++)
                        <button class="fa fa-star pl-0" onmouseover="cmbst('audio',{{ $i }})"
                        onmouseout="cmbst2('audio',{{ $i }})" id={{ 'audio'.$i }} value={{ $i }}
                        style="background-color: white; border:0;" onclick="valorar('audio',{{ $i }},{{ $video->id }}, '{{ csrf_token() }}')"></button>
                    @endfor
                    @php
                        if(Auth::user() !== null) {
                            $valoracio = $video->valoracions->where('user_id', '=', Auth::user()->id)->where('name', '=', 'audio')->first();
                            if(isset($valoracio)) {
                                echo '<script type="text/javascript">
                                    perma("audio",'.$valoracio->valoracio.');
                                </script>';
                            }
                        }
                        
                    @endphp 
                </div>
            </div>

            <div class="card shadow mt-2">
                <div class="card-body">
                    <h4 class="card-title font-weight-bolder text-center">Content quality</h4>
                    <h5 id=content>{{ isset($mitjanes['content']) ? $mitjanes['content'] : '' }} </h5><span style="color: orange;" class="fa fa-star pl-0 d-inline"></span>
                    @for ($i = 1; $i < 6; $i++)
                        <button class="fa fa-star pl-0" onmouseover="cmbst('content',{{ $i }})"
                        onmouseout="cmbst2('content',{{ $i }})" id={{ 'content'.$i }} value={{ $i }}
                        style="background-color: white; border:0;" onclick="valorar('content',{{ $i }},{{ $video->id }}, '{{ csrf_token() }}')"></button>
                    @endfor
                    @php
                        if(Auth::user() !== null) {
                            $valoracio = $video->valoracions->where('user_id', '=', Auth::user()->id)->where('name', '=', 'content')->first();
                            if(isset($valoracio)) {
                                echo '<script type="text/javascript">
                                    perma("content",'.$valoracio->valoracio.');
                                </script>';
                            }
                        }
                    @endphp
                </div>
            </div> 
    </div>
    
</div>

</div>
@endsection