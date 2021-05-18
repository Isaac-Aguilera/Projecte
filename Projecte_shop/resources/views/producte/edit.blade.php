@extends('layouts.app')

@section('content')
@stack('styles')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">

<div class="container" style="margin-top: 100px;">
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
                <div class="card shadow">
                    <div class="card-header font-weight-bold">{{ __('Edit product') }}</div>

                    <div class="card-body">

                        <form method="POST" class="myform" action="{{ route('editarProducte', $producte->id) }}" enctype="multipart/form-data">
                            @csrf

                            @if (session('message'))
                                <div class="alert alert-success">{{ session()->get('message') }}</div> 
                            @endif 

                            <input id="user_id" type="number" name="user_id" value="{{ Auth::user()->id }}" hidden>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="custom-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                                        <option value="{{ $producte->category_id }}" selected>{{ $categories[$producte->category_id]->name }}</option>
                                        @foreach($categories as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                            
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>"You have to select a category!</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" value="{{ $producte->name }}" id="name" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ $producte->description }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <img class="img-fluid mb-3"  src="/{{ $producte->image }}" alt="">
                                    <input style="max-width: 120%;" id="image" class="@error('image') is-invalid @enderror" type="file" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="preu" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input type="number" id="preu" value="{{ $producte->preu }}" class="form-control @error('preu') is-invalid @enderror" name="preu" autocomplete="preu" autofocus>

                                    @error('preu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prod_url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="prod_url" value="{{ $producte->prod_url }}" class="form-control @error('prod_url') is-invalid @enderror" name="prod_url" autocomplete="prod_url" autofocus>

                                    @error('prod_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
