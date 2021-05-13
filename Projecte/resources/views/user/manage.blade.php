@extends('layouts.app')

@section('content')
<main class="main" role="main">
    <div class="container bg-white shadow rounded" style="margin-top: 100px;">
        @include('layouts.users')
        @section('user-content')
        @stop

        <div class="row bg-light mt-3">
            <div class="col w-100">                    
                <table class="table table-responsive-md">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Video</th>
                        <th scope="col">Date</th>
                        <th scope="col">Video</th>
                        <th scope="col">Audio</th>
                        <th scope="col">Content</th>
                        <th scope="col">Views</th>
                        <th scope="col">Comments</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $video)
                        @php
                            $mitjanes = array();
                            $valoracions = $video->valoracions->groupBy('name');
                            foreach($valoracions as $nom => $name) {
                                $contador = 0;
                                $suma = 0;
                                foreach($name as $id => $valoracio) {
                                    $contador = $contador + 1;
                                    $suma = $suma + $valoracio['valoracio'];
                                }
                                $mitjanes[$nom] = round($suma / $contador,2);
                            }
                        @endphp
                      <tr id="{{  $video->id  }}">
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle btn-dark" style="position:absolute; border-radius:0; " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical font-weight-bold"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="text-decoration-none" href="/editarVideo/{{ $video->id }}"><button class="dropdown-item" >Edit</button></a>
                                    <button onclick="eliminarvideo({{ $video->id }})" class="dropdown-item" >Delete</button>
                                </div>
                            </div>
                            <img height=100 width=180 src="/{{ $video->image }}" alt="">
                            <div style="display:inline-block; vertical-align:top;" class="ml-3">
                                <span title="{{ $video->title }}"><a class="text-decoration-none text-dark" href='/video/{{ $video->id }}'>{{ Str::limit($video->title,29,"...") }}</a></span>
                                <p class="text-muted" title="{{ $video->description }}">{{ Str::limit($video->description,29,"...") }}</p>
                            </div>
                        </td>
                        <td>{{ Str::limit($video->created_at, 10, '') }}</td>
                        <td>{{ isset($mitjanes['video']) ? $mitjanes['video'] : '-' }}</td>
                        <td>{{ isset($mitjanes['audio']) ? $mitjanes['audio'] : '-' }}</td>
                        <td>{{ isset($mitjanes['content']) ? $mitjanes['content'] : '-' }}</td>
                        <td>{{ $video->views }}</td>
                        <td>
                            {{ $video->comentaris->count() }}
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>   
            </div>

        </div>
    </div>
</main>
@endsection

<script type="text/javascript">
    function eliminarvideo(id) {
        $.ajax({
                    url: '/deletevid/'+id,
                    method: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    error: function(response){
                        alert(response['statusText']);
                    },
                    success: function(response) {
                        
                        document.getElementById(id).remove()
                    }
                });
    }
</script>