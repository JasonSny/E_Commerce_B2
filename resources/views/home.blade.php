@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des achats') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach (Auth()->user()->orders as $order)
                        <br>
                            <div class="card">
                                <div class="card-header">
                                    Commande passée le
                                    {{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i') }}
                                    d'un montant de <strong> {{ getPrice($order->amount / 100 ) }} </strong>
                                </div>
                                <div class="card-body">
                                    @foreach (unserialize($order->products) as $product)
                                        <div> Nom du produit : {{ $product[0] }}</div>
                                        <div> Prix : {{ getPrice($product[1]) }} </div>
                                        <div> Quantité : {{ $product[2] }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
