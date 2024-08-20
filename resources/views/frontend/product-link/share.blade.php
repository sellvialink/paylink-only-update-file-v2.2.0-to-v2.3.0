@extends('frontend.layouts.master')

@push('css')
    <style>
        card-errors {
            height: 20px;
            padding: 4px 0;
            color: #fa755a;
        }

        #stripe-token-handler {
            position: absolute;
            top: 0;
            left: 25%;
            right: 25%;
            padding: 20px 30px;
            border-radius: 0 0 4px 4px;
            box-sizing: border-box;
            box-shadow: 0 50px 100px rgba(50, 50, 93, 0.1),
                0 15px 35px rgba(50, 50, 93, 0.15),
                0 5px 15px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 500ms ease-in-out;
            transition: all 500ms ease-in-out;
            transform: translateY(0);
            opacity: 1;
            background-color: white;
        }

        #stripe-token-handler.is-hidden {
            opacity: 0;
            transform: translateY(-80px);
        }

        #card-element {
            background-color: white;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            height: 45px;
            line-height: 45px;
            font-weight: 500;
            border: 1px solid #e5e5e5;
            font-size: 14px;
            color: #425466;
            padding: 13px 15px;
            width: 100%;
        }

        #card-element--focus {
            border: 1px solid #5b39c9;
        }

        #card-element--invalid {
            border-color: #fa755a;
        }

        #card-element--webkit-autofill {
            background-color: #fefde5 !important;
        }
        @media only screen and (max-width: 1199px) {
            .payment-preview-wrapper{
                width: 1000px;
            }
        }
        @media only screen and (max-width: 991px) {
            .payment-preview-wrapper{
                width: 100%;
            }
            .payment-share-wrapper .payment-preview-box{
                display: block;
            }
        }


    </style>
@endpush

@section('content')
<div class="custom-card payment-card">
    <div class="payment-preview-wrapper payment-share-wrapper">
        <form id="payment-form" action="{{ setRoute('product-link.submit') }}" method="POST">
            <div class="payment-preview-box">
                @csrf
                <input type="hidden" name="target" value="{{ $product_link->id }}">
                <input type="hidden" name="token">
                <input type="hidden" name="last4_card">
                <input type="hidden" name="payment_type">

                <div class="payment-preview-box-left">
                    <span class="sub-title"><i class="lab la-windows"></i> {{ @$product_link->product->product_name }}
                        ({{ @$product_link->qty }})
                    </span>
                    @if (!empty($product_link->product->desc))
                        <p>{{ $product_link->product->desc }}</p>
                    @endif
                    <div class="form-group">
                        <label>{{ __('price') }}</label>
                        <div class="input-group">
                            <div class="input-group-text prepend">{{ @$product_link->currency_symbol }}</div>
                            <input type="integer" name="amount" class="form--control" value="{{ $product_link->amount_value }}" placeholder="0.00" readonly>
                        </div>
                    </div>
                    @if ($product_link->product->image)
                        <div class="payment-preview-thumb">
                            <img src="{{ get_image($product_link->product->image,'products') }}" alt="{{ $product_link->product->product_name }}">
                        </div>
                    @endif
                </div>
                <div class="payment-preview-box-right">
                    <div class="row">

                        <div class="col-xl-12 form-group">
                            <input type="text" class="form--control" placeholder="{{ __('Full Name') }}" name="full_name" value="{{ old('full_name') }}" required>
                        </div>

                        <div class="col-xl-12 form-group">
                            <input type="email" class="form--control" name="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="col-xl-12 form-group pt-3">
                            <div class="or-area">
                                <span class="or-line"></span>
                                <span class="or-title">{{ __('Pay with Payment Gateway') }}</span>
                                <span class="or-line"></span>
                            </div>
                        </div>

                       <div class="col-xl-12 form-group">
                        <div class="payment-form-area">
                            <div class="payment-form-wrapper">
                                <div class="radio-wrapper">
                                    @foreach ($payment_gateways as $item)
                                        <div class="radio-item">
                                            <input type="radio" id="radio-{{ $item->alias }}" name="payment_gateway" value="{{ $item->alias }}">
                                            <label for="radio-{{ $item->alias }}"><img src="{{ get_image($item->image, 'payment-gateways') }}" alt="gateway"></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="payment-hidden-form" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <input type="text" class="form--control" placeholder="{{ __('card Holder Name') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="number" class="form--control" placeholder="{{ __('card number') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="text" class="form--control" placeholder="{{ __('Date') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="password" class="form--control" placeholder="{{ __('CVV') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>

                        <div class="col-xl-12 form-group card_payment_area">
                            <div class="or-area">
                                <span class="or-line"></span>
                                <span class="or-title">{{ __('Or Pay with Debit & Credit Card') }}</span>
                                <span class="or-line"></span>
                            </div>
                        </div>

                        <div class="col-xl-12 form-group card_payment_area">
                            <input type="text" class="form--control" placeholder="{{ __('Name on card') }}" name="card_name" value="{{ old('card_name') }}" required>
                        </div>

                        <div class="col-xl-12 form-group card_payment_area">
                            <div id="card-element">
                            </div>
                        </div>

                        <div class="col-xl-12 form-group">
                            <div class="preview-secure-group">
                                <img src="{{ asset('public/frontend/images/icon/100-percent.png') }}" alt="">
                                <p>{{ __('Securely save my information for 1-click checkout') }} <span>{{ __('Pay faster on') }} {{ @$product_link->user->address->company_name }} {{ __('and everywhere Link is accepted') }}</span></p>
                            </div>
                        </div>
                        <div class="col-xl-12 form-group pt-10">
                            <button type="button" id="submit-button" class="btn--base active w-100 btn-loading">{{ __('Pay') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@push("script")
    <script src="https://js.stripe.com/v3/"></script>
    <script>

        $(document).ready(function () {
            $(document).on('click', function(event){
                if($(event.target).is(".card_payment_area, .card_payment_area *")){
                    $('#payment-form input[name="payment_gateway"]').prop('checked', false);
                }
            })

            $(document).on("click", handler);
        });

        // Create a Stripe client
        var stripe = Stripe('{{ $public_key }}');
        // Create an instance of Elements
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#425466'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        $('#submit-button').on('click', function () {
            $(this).prop("disabled",true);
            let payemnt_gateway = $('#payment-form input[name="payment_gateway"]:checked').val();
            var form = document.getElementById('payment-form');
            event.preventDefault();

            if(payemnt_gateway == undefined){
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $('#submit-button').prop("disabled",false);
                        notification('danger', result.error.message);
                    } else {
                        $('#payment-form input[name="token"]').val(result.token.id);
                        $('#payment-form input[name="last4_card"]').val(result.token.card.last4);
                        $('#payment-form input[name="payment_type"]').val('card_payment');
                        if(result.token.id){
                            form.submit();
                        }else{
                            notification('danger', 'Something Went, Wrong Please Contact Support');
                        }
                    }
                });
            }else{
                $('#payment-form input[name="payment_type"]').val('payment_gateway');
                form.submit();
            }
        });
    </script>
@endpush
