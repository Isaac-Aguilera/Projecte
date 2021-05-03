@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
@section('content')
@stack('styles')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">

    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('Pujar Video') }}</div>

                <div class="card-body">
                    <form method="POST" class="myform" action="{{ route('pujarVideo') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('message')) 
                        <div class="alert alert-success">{{ session()->get('message') }}</div> 
                        @endif 

                        <input id="user_id" type="number" name="user_id" value="{{ Auth::user()->id }}" hidden>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcio') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="video_path" class="col-md-4 col-form-label text-md-right">{{ __('Video') }}</label>
                            <div class="col-md-6">
                                <input style="max-width: 120%;" id="video_path" class="custom-file @error('video_path') is-invalid @enderror" type="file" name="video_path">
                                @error('video_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Miniatura') }}</label>
                            <div class="col-md-6">
                                <input style="max-width: 120%;" id="image" class="@error('image') is-invalid @enderror" type="file" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>            
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select id="categoria_id" name="categoria_id" class="custom-select" aria-label="Default select example">
                                    <option selected>Selecciona una categoria</option>
                                    @foreach($categories as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                    @endforeach
                                </select>
                          
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pujar Vídeo') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection