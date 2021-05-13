function cambiarCategoria(id, token) {
    //var nou = '@foreach(Video::orderBy("created_at","DESC")->where("categoria_id", "=" , '+id+')->get() as $video) <div class="col-lg-4 col-md-6 col-sm-6"> <div class="card mb-4 shadow"> <a href="{{ route("video", $video->id) }}"> <video class="miniaturas w-100 p-0 m-0"  src="../{{ $video->video_path }}" poster="../{{ $video->image }}"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" loop preload="none" muted="muted"></video> </a> <div class="card-body"> <div class="row"> <div class="col-3"> <a href="{{ route("user", $video->user->nick) }}"> <img class="mr-1" style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;" src="../{{ $video->user->image }}"> </a> </div>     <div class="col-9"> <strong> <span title="{{$video->title}}"> @if ( Str::length($video->title) >= 60) {{ Str::of($video->title)->limit(57, " ...") }} @else {{ $video->title }} @endif </span> </strong> <br> <span class="text-muted">{{$video->user->nick}}</span> <br> <span class="text-muted">{{$video->views . "views"}}</span> <br> <span class="text-muted"> {{ FormatTime::LongTimeFilter($video->created_at) }} </span> </div> </div> </div> </div> </div> @endforeach';
    /*
    var nou = '@foreach(Video::orderBy("created_at","DESC")->where("categoria_id", "=" , '+id+')->get() as $video)'+
        '<div class="col-lg-4 col-md-6 col-sm-6">'+
            '<div class="card mb-4 shadow">'+
                '<a href="{{ route("video", $video->id) }}">'+
                    '<video class="miniaturas w-100 p-0 m-0"  src="/{{ $video->video_path }}" poster="/{{ $video->image }}"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" loop preload="none" muted="muted"></video>'+
                '</a>'+
                '<div class="card-body">'+
                    '<div class="row">'+
                        '<div class="col-3">'+
                            '<a href="/user/{{ $video->user->nick }}">'+
                                '<img class="mr-1" style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;" src="/{{ $video->user->image }}">'+
                            '</a>'+
                        '</div>'+
                        '<div class="col-9">'+
                            '<strong>'+
                                '<span title="{{$video->title}}">'+
                                        '@if ( Str::length($video->title) >= 60)'+
                                        '{{ Str::of($video->title)->limit(57, " ...") }}'+
                                    '@else'+
                                        '{{ $video->title }}'+
                                    '@endif'+
                                '</span>'+
                            '</strong>'+
                            '<br>'+
                            '<span class="text-muted">{{$video->user->nick}}</span>'+
                            '<br>'+
                            '<span class="text-muted">{{$video->views . "views"}}</span>'+
                            '<br>'+
                            '<span class="text-muted">'+
                                '{{ FormatTime::LongTimeFilter($video->created_at) }}'+
                            '</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '@endforeach';
    */
    $.ajax({
        url: '/aaa',
        method: 'post',
        data: {
            '_token': token,
            'id': id
        },
        error: function(response){
            alert(response['statusText']);
            //alert("Has de fer login per a poder comentar!");
        },
        success: function(response) {
            console.log(response);
            document.getElementById('videos').innerHTML = response;
        }
    });
    
}

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