@isset($transactions)
    @forelse ($transactions as $item)
        <div class="dashboard-list-item-wrapper">
            <div class="dashboard-list-item sent d-flex justify-content-between">
                <div class="dashboard-list-left">
                    <div class="dashboard-list-user-wrapper">
                        <div class="dashboard-list-user-icon">
                            <i class="las la-arrow-up"></i>
                        </div>
                        <div class="dashboard-list-user-content">
                            @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT)
                                <h4 class="title">{{ __('Add Balance via') }} <span class="text--warning">({{ $item->type }})</span></h4>
                                <span class="{{ $item->StringStatus->class }}">{{ $item->StringStatus->value }}</span>
                            @elseif ($item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                                <h4 class="title">{{ __("Balance Update From Admin (".@$item->user_wallet->currency->currency_code.")") }} </h4>
                            @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                                <h4 class="title">{{ __("Money Out") }} <span class="text--warning">{{ $item->currency->gateway->name }}</span></h4>
                                <span class="{{ $item->StringStatus->class }}">{{ $item->StringStatus->value }}</span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="dashboard-list-right">
                    @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT)
                        <h4 class="main-money text--base">{{ get_amount($item->request_amount, @$item->details->charge_calculation->sender_cur_code) }}</h4>
                        <h6 class="exchange-money">{{ get_amount($item->conversion_payable,  @$item->details->charge_calculation->receiver_currency_code) }}</h6>
                    @elseif ($item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                        <h4 class="main-money text--base">{{ get_amount($item->request_amount,$item->user_wallet->currency->currency_code) }}</h4>
                        <h6 class="exchange-money">{{ get_amount($item->available_balance,$item->user_wallet->currency->currency_code) }}</h6>
                    @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                        <h4 class="main-money text--base">{{ get_amount($item->request_amount,getUserDefaultCurrencyCode()) }}</h4>
                        <h6 class="exchange-money">{{ get_amount($item->payable,$item->currency->currency_code) }}</h6>
                    @endif
                </div>
            </div>
            <div class="preview-list-wrapper">
                <div class="preview-list-item">
                    <div class="preview-list-left">
                        <div class="preview-list-user-wrapper">
                            <div class="preview-list-user-icon">
                                <i class="las la-clock"></i>
                            </div>
                            <div class="preview-list-user-content">
                                <span>{{ __("Time & Date") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="preview-list-right">
                        <span>{{ dateFormat('d M Y, h:i:s A',$item->created_at) }}</span>
                    </div>
                </div>
                <div class="preview-list-item">
                    <div class="preview-list-left">
                        <div class="preview-list-user-wrapper">
                            <div class="preview-list-user-icon">
                                <i class="lab la-tumblr"></i>
                            </div>
                            <div class="preview-list-user-content">
                                <span>{{ __("Transaction ID") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="preview-list-right">
                        <span>{{ $item->trx_id }}</span>
                    </div>
                </div>

                @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT || $item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-exchange-alt"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>{{ __('Exchange Rate') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT)
                                <span>1 {{ @$item->details->charge_calculation->receiver_currency_code }} = {{ get_amount(@$item->details->charge_calculation->exchange_rate, @$item->details->charge_calculation->sender_cur_code) }}</span>
                            @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                                <span>1 {{ getUserDefaultCurrencyCode() }} = {{ get_amount($item->details->data->gateway_rate,
                                $item->currency->currency_code) }}</span>
                            @elseif ($item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                              <span>1 {{ get_default_currency_code() }} = {{ get_amount($item->user_wallet->currency->rate,$item->user_wallet->currency->currency_code) }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class=" preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-list-user-content">
                                    <span>{{ __('Fees & Charge') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT)
                                <span class="text--danger">{{ get_amount(@$item->details->charge_calculation->conversion_charge ?? 0, $item->user_wallet->currency->currency_code, 4) }}</span>
                            @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                            <span class="text--danger">{{ get_amount($item->charge->total_charge ?? 0, $item->currency->currency_code) }}</span>
                            @elseif ($item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                                <span>{{ get_amount($item->charge->total_charge,$item->user_wallet->currency->currency_code) }}</span>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="preview-list-item">
                    <div class="preview-list-left">
                        <div class="preview-list-user-wrapper">
                            <div class="preview-list-user-icon">
                                <i class="lab la-get-pocket"></i>
                            </div>
                            <div class="preview-list-user-content">
                                @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT || $item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                                    <span>{{ __('Available Balance') }}</span>
                                @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                                    <span>{{ __('Conversion Amount') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="preview-list-right">
                        @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT ||$item->type == payment_gateway_const()::TYPEADDSUBTRACTBALANCE)
                            <span class="text--danger">{{ get_amount($item->available_balance, getUserDefaultCurrencyCode()) }}</span>
                        @elseif ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                            <span>{{ get_amount($item->details->data->conversion_amount,$item->currency->currency_code) }}</span>
                        @endif

                    </div>
                </div>

                @if ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                <div class="preview-list-item">
                    <div class="preview-list-left">
                        <div class="preview-list-user-wrapper">
                            <div class="preview-list-user-icon">
                                <i class="lab la-get-pocket"></i>
                            </div>
                            <div class="preview-list-user-content">
                                    <span>{{ __('Will Get') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="preview-list-right">
                            <span class="text--danger">{{ get_amount($item->details->data->will_get,$item->currency->currency_code) }}</span>
                        </div>
                    </div>
                @endif

                @if ($item->type == payment_gateway_const()::TYPEPAYLINK || $item->type == payment_gateway_const()::TYPEINVOICE || $item->type == payment_gateway_const()::TYPEPRODUCT)
                    @if ($item->payment_type == payment_gateway_const()::TYPE_CARD_PAYMENT)
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __('Payment Method') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="text--danger">{{ __("Card Payment") }}</span>
                            </div>
                        </div>
                    @elseif($item->payment_type == payment_gateway_const()::TYPE_GATEWAY_PAYMENT)
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __('Payment Method') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="text--danger">{{ $item->currency->gateway->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    @else
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                        <span>{{ __('Payment Method') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                <span class="text--danger">{{ __("Card Payment") }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-envelope"></i>
                                </div>
                                <div class="preview-list-user-content">
                                        <span>{{ __('Sender Email') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                                <span class="text--danger">{{ $item->details->email ?? $item->details->validated->email }}</span>
                        </div>
                    </div>
                    <div class="preview-list-item">
                        <div class="preview-list-left">
                            <div class="preview-list-user-wrapper">
                                <div class="preview-list-user-icon">
                                    <i class="las la-user"></i>
                                </div>
                                <div class="preview-list-user-content">
                                        <span>{{ __('Sender Full Name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="preview-list-right">
                            <span class="text--danger">{{ $item->details->full_name ?? $item->details->validated->full_name?? 'N\A' }}</span>
                        </div>
                    </div>
                    @if ($item->payment_type == payment_gateway_const()::TYPE_CARD_PAYMENT)
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                            <span>{{ __('card Holder Name') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                    <span class="text--danger">{{ $item->details->card_name }}</span>
                            </div>
                        </div>
                        <div class="preview-list-item">
                            <div class="preview-list-left">
                                <div class="preview-list-user-wrapper">
                                    <div class="preview-list-user-icon">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <div class="preview-list-user-content">
                                            <span>{{ __('Sender Card Number') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-list-right">
                                    <span class="text--danger">*** *** *** {{ @$item->details->last4_card }}</span>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="preview-list-item">
                    <div class="preview-list-left">
                        <div class="preview-list-user-wrapper">
                            <div class="preview-list-user-icon">
                                <i class="las la-smoking"></i>
                            </div>
                            <div class="preview-list-user-content">
                                <span>{{ __('Status') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="preview-list-right">
                        <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-primary text-center">
            {{ __("No Record Found!") }}
        </div>
    @endforelse
@endisset
