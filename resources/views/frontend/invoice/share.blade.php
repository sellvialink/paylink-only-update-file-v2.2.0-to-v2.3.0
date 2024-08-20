@extends('frontend.layouts.master')

@php
    $defualt = get_default_language_code()??'en';
    $default_lng = 'en';
@endphp

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
        .payment-preview-wrapper{
            width: 1200px;
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
        <form id="invoice-payment-form" action="{{ setRoute('invoice.submit') }}" method="POST">
            <div class="payment-preview-box">
                @csrf
                <input type="hidden" name="target" value="{{ $invoice->id }}">
                <input type="hidden" name="last4_card">
                <input type="hidden" name="token">
                <input type="hidden" name="payment_type">

                <div class="payment-preview-box-left">
                    <span class="sub-title mb-2"><i class="lab la-windows"></i> {{ @$invoice->title }}</span>

                    <div class="payment-invoice-table m-0">
                        <div class="table-wrapper">
                            <div class="table-responsive">
                                <table class="custom-table two">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Qty') }}</th>
                                            <th>{{ __('Unit price') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (@$invoice->invoiceItems ?? [] as $item)
                                            <tr>
                                                <td>{{ @$item->title }}</td>
                                                <td>{{ @$item->qty }}</td>
                                                <td>{{ @$invoice->currency_symbol }}{{ @$item->price }}</td>
                                                <td>{{ @$invoice->currency_symbol }}{{ @$item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="payment-invoice-table-list-wrapper">
                            <ul class="payment-invoice-table-list">
                                <li>{{ __('Qty') }} <span>{{ $invoice->qty }}</span></li>
                                <li>{{ __('Subtotal') }} <span>{{ @$invoice->currency_symbol }}{{ get_amount(@$invoice->amount) }}</span></li>
                                <li><b>{{ __('Amount due') }}</b> <span>{{ @$invoice->currency_symbol }}{{ get_amount(@$invoice->amount) }}</span></li>
                            </ul>
                        </div>
                        <div class="payment-invoice-footer">
                            <p>{{ $invoice->invoice_no }} - {{ @$invoice->currency_symbol }}{{ get_amount(@$invoice->amount) }} {{ __('due') }} {{ dateFormat('d F Y', $invoice->created_at) }}</p>
                        </div>
                    </div>

                </div>
                <div class="payment-preview-box-right">
                    <div class="row">

                        <div class="col-xl-12 form-group">
                            <input type="text" class="form--control" placeholder="Full Name" name="full_name" value="{{ old('full_name') }}" required>
                        </div>

                        <div class="col-xl-12 form-group">
                            <input type="email" class="form--control" name="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
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
                                        <input type="text" class="form--control" placeholder="Cardholder name">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="number" class="form--control" placeholder="Card number">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="text" class="form--control" placeholder="Date">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="password" class="form--control" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>

                        <div class="col-xl-12 form-group">
                            <div class="or-area">
                                <span class="or-line"></span>
                                <span class="or-title">{{ __('Or Pay with Debit & Credit Card') }}</span>
                                <span class="or-line"></span>
                            </div>
                        </div>

                        <div class="col-xl-12 form-group card_payment_area">
                            <input type="text" class="form--control" placeholder="Name On Card" name="card_name" value="{{ old('card_name') }}" required>
                        </div>

                        <div class="col-xl-12 form-group card_payment_area">
                            <div id="card-element">
                            </div>
                        </div>

                        <div class="col-xl-12 form-group">
                            <div class="preview-secure-group">
                                <img src="{{ asset('public/frontend/images/icon/100-percent.png') }}" alt="">
                                <p>{{ __('Securely save my information for 1-click checkout') }} <span>{{ __('Pay faster on') }} {{ @$invoice->user->address->company_name }} {{ __('and everywhere Link is accepted') }}</span></p>
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
                    $('#invoice-payment-form input[name="payment_gateway"]').prop('checked', false);
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
            event.preventDefault();
            let payemnt_gateway = $('#invoice-payment-form input[name="payment_gateway"]:checked').val();
            var form = document.getElementById('invoice-payment-form');
            if(payemnt_gateway == undefined){
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $('#submit-button').prop("disabled",false);
                        notification('danger', result.error.message);
                    } else {
                        $('#invoice-payment-form input[name="token"]').val(result.token.id);
                        $('#invoice-payment-form input[name="last4_card"]').val(result.token.card.last4);
                        $('#invoice-payment-form input[name="payment_type"]').val('card_payment');
                        if(result.token.id){
                            form.submit();
                        }else{
                            notification('danger', 'Something Went, Wrong Please Contact Support');
                        }
                    }
                });
            }else{
                $('#invoice-payment-form input[name="payment_type"]').val('payment_gateway');
                form.submit();
            }
        });
    </script>
@endpush
