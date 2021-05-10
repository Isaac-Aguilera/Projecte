@stack('styles')
<link href="{{ asset('css/users.css') }}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/radialIndicator/1.4.0/radialIndicator.js"></script>


<div class="row">

    <div id="bannerdiv" class="col-12 p-0 mb-5 position-relative">

        @if ($user->banner == null)
          @if (session('incorrecte')) 
          <div class="alert alert-danger">{{ session()->get('incorrecte') }}</div>
          @endif
          @if($user->id == Auth::user()->id)
          <button class="btn btn-light position-absolute fixed-top" style="border-radius: 0;" onclick="canviarBanner()"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>
          @endif
        @else
        @if (session('correcte')) 
          <img class="centered-and-cropped w-100"  height="200" src="/{{ $user->banner }}">
          @if($user->id == Auth::user()->id)
          <button class="btn btn-light position-absolute fixed-top" style="border-radius: 0;" onclick="canviarBanner()"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>
          @endif
        @else
          @if (session('incorrecte')) 
          <div class="alert alert-danger">{{ session()->get('incorrecte') }}</div>
          @endif
          <img class="centered-and-cropped w-100"  height="200" src="/{{ $user->banner }}">
            @if($user->id == Auth::user()->id)
          <button class="btn btn-light position-absolute fixed-top" style="border-radius: 0;" onclick="canviarBanner()"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>
          @endif
        @endif
        @endif
    </div>
</div>
@if(Auth::user()->id == $user->id)
        <div class="row">
            <div class="col-8">
                <a href="{{ route('user', $user->nick) }}">
                    <img class="mr-1" style="border-radius:50%;width:5.5vw;min-width:80px;min-height:80px;"
                        src="/{{ $user->image }}">
                </a>
                <strong><span class="h1 pl-3 fw">{{ $user->nick }}</span></strong>
            </div>

            <div class="col-4 mt-3 ">
                    <a href="{{ route('pujarVideo') }}"><button class="btn btn-outline-dark">UPLOAD</button></a>
                
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          CONFIG
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('config') }}">CONFIG PROFILE</a>
                          <a class="dropdown-item" href="{{ route('configPassword') }}">CHANGE PASSWORD</a>
                      </div>
                    </div>
            </div>   
        </div>
        @else

        <div class="row">
            <div class="col-12 w-100">
                <a href="{{ route('user', $user->nick) }}"> 
                    <img class="mr-1" style="border-radius:50%;width:5.5vw;min-width:80px;min-height:80px;"
                        src="../../{{ $user->image }}">
                </a>
                <strong><span class="h1 pl-3">{{ $user->nick }}</span></strong>
            </div>
        </div>
        @endif

<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <ul class="navbar-nav  mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('user', [$user->nick]) }}">PROFILE</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('uservid', [$user->nick]) }}">VIDEOS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('userinfo', [$user->nick]) }}">MORE INFO</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="d-flex justify-content-end" method="GET" action="{{ route('usersearch', $user->nick) }}">
                    <input class="form-control me-2 mt-3" type="search" placeholder="Search" aria-label="Search"
                        id="search" name="search">
                    <button class="btn btn-outline-success ml-2 mt-3" type="submit">Search</button>
                </form>
            </ul>
        </nav>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
    function canviarBanner() {
      divbann = document.getElementById("bannerdiv");
      console.log(divbann.innerHTML);
      divbann.innerHTML = "";

      divbann.innerHTML += '<form method="POST" action="{{ route("canviarbanner") }}" enctype="multipart/form-data">@csrf<div class="container"><div class="row"><div class="col-md-12"><div class="form-group"><label id="proba" class="control-label">Change Banner</label><div class="preview-zone hidden"><div class="box box-solid"><div class="box-header with-border"><div><b>Preview</b></div><div class="box-tools pull-right"><button type="button" class="btn btn-danger btn-xs remove-preview"><i class="fa fa-times"></i> Reset The Field</button></div></div><div class="box-body"></div></div></div><div class="dropzone-wrapper"><div class="dropzone-desc"><i class="glyphicon glyphicon-download-alt"></i><p>Choose an image file or drag it here.</p></div><input id="img_logo"  type="file" name="img_logo" class="dropzone"></div></div></div></div><div class="row"><div class="col-md-12"><button type="submit" class="btn btn-primary pull-right">Upload</button></div></div></div></form>';
      $( document ).ready(function() {

        function readFile(input) {
          if (input.files && input.files[0]) {
              
            var reader = new FileReader();

            reader.onload = function(e) {
            var htmlPreview =
            '<img width="200" src="' + e.target.result + '" />' +
            '<p>' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
          };

        reader.readAsDataURL(input.files[0]);
        }
      }

      function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
      }

      $(".dropzone").change(function() {
        readFile(this);
      });

      $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
      });

      $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
      });

      $('.remove-preview').on('click', function() {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
      });
    });
  }

  


    
    
</script>

<main>
    @yield('user-content')
</main>


