@extends('layouts.app')

@section('content')
<main class="main" role="main">
    <div class="container bg-white shadow rounded">
        @include('layouts.users')
        @section('user-content')
        @stop

        <div class="row bg-light mt-3">
            <div class="col-12">                    
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Video</th>
                        <th scope="col">Date</th>
                        <th scope="col">Views</th>
                        <th scope="col">Comments</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $video)
                      <tr id="{{  $video->id  }}">
                        <td>
                            <img height=100 width=180 src="/{{ $video->image }}" alt="">
                            <div style="display:inline-block; vertical-align:top;" class="ml-3">
                                <span title="{{ $video->title }}">{{ Str::limit($video->title,29,"...") }}</span>
                                <p class="text-muted" title="{{ $video->description }}">{{ Str::limit($video->description,29,"...") }}</p>
                            </div>
                        </td>
                        <td>{{ Str::limit($video->created_at, 10, '') }}</td>
                        <td>{{ $video->views }}</td>
                        <td>
                            {{ $video->comentaris->count() }}
                            <div class="dropdown float-right">
                                <button class="btn dropdown-toggle pt-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item" >Edit</button>
                                    <button onclick="eliminarvideo({{ $video->id }})" class="dropdown-item" >Delete</button>
                                </div>
                            </div>
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