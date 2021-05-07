@extends('layouts.app')
@stack('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<main class="main" role="main">
    <div class="container bg-white shadow rounded">
      
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
            <div id="colDesc" class="col-8">
                <p class="font-weight-bold">Description</p>
                <hr>
                <button id="desc" class="btn btn-light" style="border-radius: 0;" onclick="editDesc()"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>

                <span id="descSpan" class="ml-2">{{ $user->channel_desc }}</span>

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


<script type="text/javascript">


    function editDesc() {
       
        $valueDesc = document.getElementById("descSpan").innerHTML;
        $colDesc = document.getElementById("colDesc");
        $colDesc.innerHTML = "";
        $colDesc.innerHTML += '<p class="font-weight-bold">Description</p>';
        $colDesc.innerHTML += '<hr>';
        $colDesc.innerHTML += '<textarea id="desctextarea" class="form-control" rows="5">'+$valueDesc+'</textarea><br>';
        $colDesc.innerHTML += '<input id="ShowButton" class="btn btn-lg btn-block btn-success mb-3" type="submit" value="Save" onclick="guardarDesc()">';
    }

    function guardarDesc() {

        desc = document.getElementById("desctextarea").value;

        console.log(desc);
        $.ajax({
                    url: '/canviardesc',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'desc': desc,
                    },
                    error: function(response){
                        alert(response['statusText']);
                    },
                    success: function(response) {
                        $colDesc = document.getElementById("colDesc");
                        $colDesc.innerHTML = "";

                        $colDesc.innerHTML += '<p class="font-weight-bold">Description</p>';
                        $colDesc.innerHTML += '<hr>';
                        $colDesc.innerHTML += '<button id="desc" class="btn btn-light" style="border-radius: 0;" onclick="editDesc()"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>';
                        $colDesc.innerHTML += '<span id="descSpan" class="ml-2">'+desc+'</span>';

                    }
                });
    }

</script>
    
