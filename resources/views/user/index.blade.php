@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mes Informations Personnelles   ') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('editUser') }}">
                            <div class="card">
                                <div class="card-body">
                                    <div><strong> Nom : </strong> {{ $user->name }}</div>
                                    <div><strong> Prénom : </strong> {{ $user->lastName }}</div>
                                    <div><strong> Date de naissance : </strong>{{ $user->birthday }}</div>
                                    <div><strong> Email : </strong>{{ $user->email }}</div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-dark w-100"> Editer </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
