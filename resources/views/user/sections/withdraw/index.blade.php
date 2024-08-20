@extends('user.layouts.master')

@push('css')

@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __(@$page_title)])
@endsection

@section('content')
<div class="body-wrapper">
    <div class="row mb-20-none">
        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="payment-header">
                    <h3 class="title">{{ $page_title }}</h3>
                </div>
                <div class="card-body">
                    <form class="card-form" action="{{ setRoute('user.withdraw.insert') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 form-group text-center">
                                <div class="exchange-area">
                                    <code class="d-block text-center"><span>{{ __("Exchange Rate") }}</span> <span class="rate-show">--</span></code>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __("Payment Gateway") }}<span>*</span></label>
                                <select class="form--control select2-basic gateway-select" name="gateway">
                                    <option disabled selected>Select Gateway</option>
                                    @forelse ($payment_gateways ?? [] as $item)
                                        <option
                                            value="{{ $item->alias  }}"
                                            data-currency="{{ $item->currency_code }}"
                                            data-min_amount="{{ $item->min_limit }}"
                                            data-max_amount="{{ $item->max_limit }}"
                                            data-percent_charge="{{ $item->percent_charge }}"
                                            data-fixed_charge="{{ $item->fixed_charge }}"
                                            data-rate="{{ $item->rate }}"
                                            >
                                            {{ $item->name }} {{ $item->gateway->type == "MANUAL"? '(MANUAL)':'' }}
                                        </option>
                                    @empty
                                        <option disabled selected> {{ __("No Gateway Available") }}</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __("Amount") }}<span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control" required placeholder="{{ __('enter Amount') }}" name="amount" value="{{ old("amount") }}">
                                    <select class="form--control nice-select">
                                        <option value="{{ getUserDefaultCurrencyCode() }}">{{ getUserDefaultCurrencyCode() }}</option>
                                    </select>
                                </div>
                                <code class="d-block mt-10 text-end text--dark fw-bold balance-show">{{ __("Available Balance") }} {{ authWalletBalance() }} {{ getUserDefaultCurrencyCode() }}</code>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <div class="note-area">
                                    <code class="d-block limit-show">--</code>
                                    <code class="d-block fees-show">--</code>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit" class="btn--base w-100 btn-loading">{{ __("Money Out") }} <i class="fas fa-arrow-alt-circle-right ms-1"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="payment-header">
                    <h3 class="title">{{__('Preview')}}</h3>
                </div>
                <div class="card-body">
                    <div class="preview-list-wrapper">
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-receipt"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __("Entered Amount") }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="request-amount">--</span>
                            </div>
                        </div>
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="lab la-get-pocket"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __("Conversion Amount") }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="conversionAmount">--</span>
                            </div>
                        </div>
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-battery-half"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __("Total Fees & Charges") }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="fees">--</span>
                            </div>
                        </div>

                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-money-check-alt"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span class="">{{ __("Will Get") }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="text--success will-get">--</span>
                            </div>
                        </div>
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-money-check-alt"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span class="last">{{ __("Payable Amount") }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="text--warning last total-pay">--</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-list-area mt-20">
        <div class="dashboard-header-wrapper">
            <h4 class="title ">{{__("Money Out Log")}}</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn mb-2">
                    <a href="{{ setRoute('user.transactions.index','money-out') }}" class="btn--base">{{__("view More")}}</a>
                </div>
            </div>
        </div>
        <div class="dashboard-list-wrapper">
            @include('user.components.transaction-log',compact("transactions"))
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>

         var defualCurrency = "{{ getUserDefaultCurrencyCode() }}";
         var defaulCurrencyRate = "{{ getUserDefaultCurrencyRate() }}";

        $('select[name=gateway]').on('change',function(){
            getExchangeRate($(this));
            getLimit();
            getFees();
            getPreview();
        });
        $(document).ready(function(){
            // getExchangeRate();
            // getLimit();
            // getFees();
            //getPreview();
        });
        $("input[name=amount]").keyup(function(){
             getFees();
             getPreview();
        });
        function getExchangeRate(event) {
            var element = event;
            var currencyCode = acceptVar().currencyCode;
            var currencyRate = acceptVar().currencyRate;
            var currencyMinAmount = acceptVar().currencyMinAmount;
            var currencyMaxAmount = acceptVar().currencyMaxAmount;

            currencyRate = convirtionAmoutCalcuation(1, defaulCurrencyRate, currencyRate);
            $('.rate-show').html("1 " + defualCurrency + " = " + parseFloat(currencyRate).toFixed(4) + " " + currencyCode);
        }
        function getLimit() {
            var sender_currency = acceptVar().currencyCode;
            var currencyRate = acceptVar().currencyRate;
            var min_limit = acceptVar().currencyMinAmount;
            var max_limit =acceptVar().currencyMaxAmount;

            if($.isNumeric(min_limit) || $.isNumeric(max_limit)) {

                min_limit = convirtionAmoutCalcuation(min_limit, currencyRate, defaulCurrencyRate);
                max_limit = convirtionAmoutCalcuation(max_limit, currencyRate, defaulCurrencyRate);

                var min_limit_calc = parseFloat(min_limit).toFixed(4);
                var max_limit_clac = parseFloat(max_limit).toFixed(4);

                $('.limit-show').html("{{ __('Limit') }} " + min_limit_calc + " " + defualCurrency + " - " + max_limit_clac + " " + defualCurrency);
                return {
                    minLimit:min_limit_calc,
                    maxLimit:max_limit_clac,
                };
            }else {
                $('.limit-show').html("--");
                return {
                    minLimit:0,
                    maxLimit:0,
                };
            }
        }

        function acceptVar() {
            var selectedVal = $("select[name=gateway] :selected");
            var currencyCode = $("select[name=gateway] :selected").attr("data-currency");
            var currencyRate = $("select[name=gateway] :selected").attr("data-rate");
            var currencyMinAmount = $("select[name=gateway] :selected").attr("data-min_amount");
            var currencyMaxAmount = $("select[name=gateway] :selected").attr("data-max_amount");
            var currencyFixedCharge = $("select[name=gateway] :selected").attr("data-fixed_charge");
            var currencyPercentCharge = $("select[name=gateway] :selected").attr("data-percent_charge");

            // var sender_select = $("input[name=from_wallet_id] :selected");

            return {
                currencyCode:currencyCode,
                currencyRate:currencyRate,
                currencyMinAmount:currencyMinAmount,
                currencyMaxAmount:currencyMaxAmount,
                currencyFixedCharge:currencyFixedCharge,
                currencyPercentCharge:currencyPercentCharge,
                selectedVal:selectedVal,

            };
        }

        function feesCalculation() {
            var sender_currency = acceptVar().currencyCode;
            var sender_currency_rate = acceptVar().currencyRate;
            var sender_amount = $("input[name=amount]").val();
            sender_amount == "" ? (sender_amount = 0) : (sender_amount = sender_amount);

            var conversion_amount = convirtionAmoutCalcuation(parseFloat(sender_amount), defaulCurrencyRate, sender_currency_rate)

            var fixed_charge = acceptVar().currencyFixedCharge;
            var percent_charge = acceptVar().currencyPercentCharge;
            if ($.isNumeric(percent_charge) && $.isNumeric(fixed_charge) && $.isNumeric(conversion_amount)) {
                // Process Calculation
                var fixed_charge_calc = parseFloat(fixed_charge);
                var percent_charge_calc = (parseFloat(conversion_amount) / 100) * parseFloat(percent_charge);
                var total_charge = parseFloat(fixed_charge_calc) + parseFloat(percent_charge_calc);
                total_charge = parseFloat(total_charge).toFixed(4);
                // return total_charge;
                return {
                    total: total_charge,
                    fixed: fixed_charge_calc,
                    percent: percent_charge,
                };
            } else {
                // return "--";
                return false;
            }
        }

        function getFees() {
            var sender_currency = acceptVar().currencyCode;
            var percent = acceptVar().currencyPercentCharge;
            var charges = feesCalculation();
            if (charges == false) {
                return false;
            }
            $(".fees-show").html("{{ __('Charge') }}: " + parseFloat(charges.fixed).toFixed(4) + " " + sender_currency + " + " + parseFloat(charges.percent).toFixed(4) + "%");
        }
        function getPreview() {
                var senderAmount = $("input[name=amount]").val();
                var sender_currency = acceptVar().currencyCode;
                var sender_currency_rate = acceptVar().currencyRate;
                // var receiver_currency = acceptVar().rCurrency;
                senderAmount == "" ? senderAmount = 0 : senderAmount = senderAmount;

                // Sending Amount
                $('.request-amount').text(senderAmount + " " + defualCurrency);

                // Fees
                var charges = feesCalculation();
                var total_charge = 0;
                if(senderAmount == 0){
                    total_charge = 0;
                }else{
                    total_charge = charges.total;
                }

                $('.fees').text(total_charge + " " + sender_currency);

                var conversionAmount = convirtionAmoutCalcuation(parseFloat(senderAmount), defaulCurrencyRate, sender_currency_rate);
                $('.conversionAmount').text(parseFloat(conversionAmount).toFixed(4) + " " + sender_currency);
                // willget
                var will_get = convirtionAmoutCalcuation(parseFloat(senderAmount), defaulCurrencyRate, sender_currency_rate);

                var will_get_total = 0;
                if(senderAmount == 0){
                     will_get_total = 0;
                }else{
                     will_get_total =  parseFloat(will_get) - parseFloat(charges.total);
                }
                $('.will-get').text(parseFloat(will_get_total).toFixed(4) + " " + sender_currency);

                // total payable
                var totalPay = parseFloat(senderAmount)
                var pay_in_total = 0;
                if(senderAmount == 0){
                     pay_in_total = 0;
                }else{
                    //  pay_in_total =  parseFloat(totalPay) + parseFloat(charges.total);
                     pay_in_total =  parseFloat(totalPay);
                }
                $('.total-pay').text(parseFloat(pay_in_total).toFixed(4) + " " + defualCurrency);

        }


        function convirtionAmoutCalcuation(amount, defaulCurrencyRate, currencyRate){
            return (amount / defaulCurrencyRate) * currencyRate;
        }

    </script>
@endpush
