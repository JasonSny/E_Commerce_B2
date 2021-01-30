@extends('layouts.master')

@section('extra_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @if (Cart::count() > 0)

        <div class="px-4 px-lg-0">
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase"> Produit </div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase"> Prix </div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase"> Quantité </div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase"> Supprimer </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $product)
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                        <img src="{{ $product->model->image }}" alt="" width="70"
                                                            class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="#"
                                                                    class="text-dark d-inline-block align-middle">
                                                                    {{ $product->model->title }} </a></h5>
                                                            <span
                                                                class="text-muted font-weight-normal font-italic d-block">Category:</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong>
                                                        {{ $product->subtotal() }} €</strong></td>
                                                <td class="border-0 align-middle">
                                                    <select name="qty" id="qty" data-id="{{ $product->rowId }}"
                                                        data-stock="{{ $product->model->stock }}" class="custom-select">
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == $product->qty ? 'selected' : '' }}>{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td class="border-0 align-middle">
                                                    <form action="{{ route('cart.destroy', $product->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-dark"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for
                                seller</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have some information for the seller you can leave them
                                    in the box below</p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                                    have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    {{-- <li
                                        class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                                    --}}
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">{{ getPrice(Cart::total()) }}</h5>
                                    </li>
                                </ul><a href="{{ route('checkout.index') }} "
                                    class="btn btn-dark rounded-pill py-2 btn-block"> Passer la commande </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <h4> Votre panier est vide </h4>
    @endif
@endsection

@section('extra_js')
    <script>
        var selects = document.querySelectorAll('#qty');
        Array.from(selects).forEach((element) => {
            element.addEventListener('change', function() {

                var rowId = element.getAttribute('data-id');
                var stock = element.getAttribute('data-stock');
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(
                    `/panier/${rowId}`, {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                        },
                        method: 'patch',
                        body: JSON.stringify({
                            qty: this.value,
                            stock: stock
                        })
                    }
                ).then((data) => {
                    console.log(data);
                    location.reload();
                }).catch((error) => {
                    console.log(error);
                })
            });
        });

    </script>
@endsection
