@extends('layouts.master')

@section('extra_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra_script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <h2> Page de paiement </h2>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" class="my-4">
                    <div id="card-element">
                    </div>
                    <div id="card-errors" role="alert"></div>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-warning mt-4" id="submit"><strong>  Procéder au paiement ({{ getPrice(Cart::total()) }}) </strong></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        stripe = Stripe(
            'pk_test_51I0I0pGBOUmmO7PN1laixJkLeMychIxfJXWb1KeuyDIz3fem3Yxn4kgXBIofmtckYYiTR0ul5XL0ZninRDvPTrZ300Hee6ubVL'
        );
        var elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };

        var card = elements.create("card", {
            style: style
        });
        card.mount("#card-element");

        card.on('change', ({
            error
        }) => {
            let displayError = document.getElementById('card-errors');
            if (error) {
                displayError.classList.add('alert', 'alert-warning');
                displayError.textContent = error.message;
            } else {
                displayError.classList.remove('alert', 'alert-warning');
                displayError.textContent = '';
            }
        });

        var submitButton = document.getElementById('submit');

        submitButton.addEventListener('click', function(ev) {
            ev.preventDefault();
            submitButton.disabled = true;
            stripe.confirmCardPayment("{{ $clientSecret }}", {
                payment_method: {
                    card: card
                }
            }).then(function(result) {
                if (result.error) {
                    submitButton.disabled = false;
                    console.log(result.error.message);
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        var paymentIntent = result.paymentIntent;
                        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        var form = document.getElementById('payment-form');
                        var url = form.action;
                        var redirect = '/merci';

                        fetch(
                            url,
                            {
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json, text-plain, */*",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-TOKEN": token
                                },
                                method: 'post',
                                body: JSON.stringify({
                                    paymentIntent: paymentIntent
                                })
                            }).then((data) => {
                            console.log(data)
                            window.location.href = redirect;
                        }).catch((error) => {
                            console.log(error)
                        })
                    }
                }
            });
        });

    </script>
@endsection
