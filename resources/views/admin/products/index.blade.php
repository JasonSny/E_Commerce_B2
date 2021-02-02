@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong> {{ __('Liste des jeux') }} </strong>
                        <a href="{{ route('admin.products.create') }}"><button
                            class="btn btn-dark float-right"> Ajouter </button></a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"> Image </th>
                                    <th scope="col"> Nom </th>
                                    <th scope="col"> Prix </th>
                                    <th scope="col"> Stock </th>
                                    <th scope="col"> Actions </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td><img src="{{ $product->image }}"></td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ getPrice($product->price) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="mt-2">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"><button
                                                    class="btn btn-dark"> Editer </button></a>
                                            
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> Supprimer </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $products->appends(request()->input())->links() }}
@endsection
