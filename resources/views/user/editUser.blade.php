@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier <strong> {{ $user->name }}</strong></div>
                    <div class="card-body">
                        <form action="{{ route('updateUser', [
                            'id' => $user->id
                        ]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label">{{ __('lastName') }}</label>

                                <div class="col-md-12">
                                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                                        name="lastName" value="{{ old('lastName') ?? $user->lastName }}" required autocomplete="lastName"
                                        autofocus>

                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label">{{ __('birthday') }}</label>

                                <div class="col-md-12">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                                        name="birthday" value="{{ old('birthday') ?? $user->birthday }}" required autocomplete="birthday"
                                        autofocus>

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-6 col-form-label ">{{ __('E-mail') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') ?? $user->email }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> Modifier les informations </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection