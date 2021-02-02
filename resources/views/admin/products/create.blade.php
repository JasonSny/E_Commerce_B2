@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Ajouter un jeu : </strong></div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label">{{ __('Nom') }}</label>

                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required
                                        autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label">{{ __('Slug') }}</label>

                                <div class="col-md-12">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" value="{{ old('slug') }}" required
                                        autocomplete="slug" autofocus>

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label ">{{ __('Description') }}</label>

                                <div class="col-md-12">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" required
                                        autocomplete="description" autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subtitle"
                                    class="col-md-4 col-form-label">{{ __('Sous-Description') }}</label>
                                <div class="col-md-12">
                                    <input id="subtitle" type="text"
                                        class="form-control @error('subtitle') is-invalid @enderror" name="subtitle"
                                        value="{{ old('subtitle') }}" required
                                        autocomplete="subtitle" autofocus>

                                    @error('subtitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-6 col-form-label ">{{ __('Prix') }}</label>

                                <div class="col-md-12">
                                    <input id="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price"
                                        autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-6 col-form-label ">{{ __('Stock') }}</label>
                                <div class="col-md-12">
                                    <input id="stock" type="number"
                                        class="form-control @error('stock') is-invalid @enderror" name="stock"
                                        value="{{ old('stock') }}" required autocomplete="stock"
                                        autofocus>

                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h5> Image : </h5>
                            <input type="file" name="image" id="fileToUpload">

                            <button type="submit" name="submit" class="btn btn-dark w-100 mt-5"> Modifier les informations </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
