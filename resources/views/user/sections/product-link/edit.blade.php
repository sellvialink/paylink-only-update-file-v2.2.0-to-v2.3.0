@extends('user.layouts.master')


@section('content')
<div class="body-wrapper payment-body-wrapper">
    <div class="custom-card payment-card">
        <div class="payment-type-wrapper">
            <form action="{{ setRoute('user.product-link.update') }}" method="POST" class="payment-form">
                @csrf
                <input type="hidden" name="target" value="{{ $product_link->id }}">
                <div class="payment-product-box payment-box-area" id="sub-view">
                    <div class="payment-product-form">
                        <div class="row">
                            <div class="col-xl-12 form-group">
                                <label>{{ __('Currency') }}*</label>
                                <select class="select2-auto-tokenize currency_link w-100" name="currency" required>
                                    <option value="" disabled>{{ __('Select One') }}</option>
                                    @foreach ($currency_data as $item)
                                        <option value="{{ $item->id }}" {{ $product_link->currency_name == $item->name ? 'selected' : '' }} data-currency_symbol="{{ $item->symbol }}">{{ $item->code. ' ('. $item->name.')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __('price') }}*</label>
                                <div class="input-group">
                                    <div class="input-group-text prepend">{{ $product_link->currency_symbol }}</div>
                                    <input type="number" name="price" class="form--control" value="{{ get_amount($product_link->price) }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __('Quantity') }}*</label>
                                <input type="number" class="form--control" value="{{ $product_link->qty }}" name="quantity" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn--base mt-20 btn-loading active w-100">{{ __('submit') }}</button>
            </form>
        </div>
        <div class="payment-preview-wrapper">
            <div class="payment-header">
                <h3 class="title">{{ __('Preview') }}</h3>
                <div class="payment-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile" type="button" role="tab" aria-controls="mobile" aria-selected="false"><i class="las la-mobile-alt"></i></button>
                            <button class="nav-link active" id="web-tab" data-bs-toggle="tab" data-bs-target="#web" type="button" role="tab" aria-controls="web" aria-selected="true"><i class="las la-tv"></i></button>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                    <div class="payment-preview-mockup">
                        <img src="{{ asset('public/frontend/') }}/images/element/mockup.png" alt="element">
                        <div class="payment-preview-box two">
                            <div class="payment-preview-box-left">
                                <h3 class="sub-title "><i class="lab la-windows"></i> <span class="link-sub-title">{{ @$product->product_name }}</span> <span class="paylink_qty">({{ $product_link->qty }})</span></h3>
                                @if (!empty($product->desc))
                                    <p>{{ $product->desc }}</p>
                                @endif
                                <form class="payment-preview-box-left-form">
                                    <div class="form-group">
                                        <label>{{ __('Amount') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-text prepend currency_link_symbol">{{ $product_link->currency_symbol }}</div>
                                            <input type="text" class="form--control paylink_amount" value="{{ get_amount($product_link->price) }}" min="0.1" readonly>
                                        </div>
                                    </div>
                                </form>
                                <div class="payment-preview-thumb">
                                    <img src="{{ get_image($product->image,'products') }}" alt="{{ $product->product_name }}">
                                </div>
                            </div>
                            <div class="payment-preview-box-right">
                                <form class="payment-preview-box-right-form">
                                    <div class="row">

                                        <div class="col-xl-12 form-group">
                                            <div class="or-area">
                                                <span class="or-line"></span>
                                                <span class="or-title">{{ __('Pay With Payment Gateway') }}</span>
                                                <span class="or-line"></span>
                                            </div>
                                        </div>

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

                                        <div class="col-xl-12 form-group">
                                            <div class="or-area">
                                                <span class="or-line"></span>
                                                <span class="or-title">{{ __('Or Pay with Debit & Credit Card') }}</span>
                                                <span class="or-line"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input type="email" class="form--control" readonly placeholder="{{ __('Email') }}">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <label>{{ __('Name On Card') }}</label>
                                            <input type="text" class="form--control" readonly placeholder="{{ __('Name On Card') }}">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <div class="input-group two">
                                                <div class="input-group-text prepend">
                                                    <img src="{{ asset('public/frontend/images/icon/credit-card.png') }}" alt="">
                                                </div>
                                                <input type="text" class="form--control" placeholder="{{ __('card Number') }}" name="card_name" value="{{ old('card_name') }}" readonly>
                                                <div class="input-group-text append">MM / YY / CVC</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <div class="preview-secure-group">
                                                <img src="{{ asset('public/frontend/images/icon/100-percent.png') }}" alt="">
                                                <p>{{ __('Securely save my information for 1-click checkout') }} <span>{{ __('Pay faster on') }} {{ Auth::user()->address->company_name ?? '' }} {{ __('and everywhere Link is accepted') }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 form-group pt-10">
                                            <button type="submit" class="btn--base disabled active w-100 btn-loading" disabled>{{ __('Pay') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="web" role="tabpanel" aria-labelledby="web-tab">
                    <div class="payment-preview-box">
                        <div class="payment-preview-box-left">
                            <span class="sub-title"><i class="lab la-windows"></i> <span class="link-sub-title">{{ @$product->product_name }}</span> <span class="paylink_qty">({{ $product_link->qty }})</span></span>
                            @if (!empty($product->desc))
                                <p>{{ $product->desc }}</p>
                            @endif
                            <form class="payment-preview-box-left-form">
                                <div class="form-group">
                                    <label>{{ __('Amount') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-text prepend currency_link_symbol">{{ $product_link->currency_symbol }}</div>
                                        <input type="text" class="form--control paylink_amount" value="{{ get_amount($product_link->price) }}" placeholder="0.00" min="0.1" readonly>
                                    </div>
                                </div>
                            </form>
                            <div class="payment-preview-thumb">
                                <img src="{{ get_image($product->image,'products') }}" alt="{{ $product->product_name }}">
                            </div>
                        </div>
                        <div class="payment-preview-box-right">
                            <form class="payment-preview-box-right-form">
                                <div class="row">

                                    <div class="col-xl-12 form-group">
                                        <div class="or-area">
                                            <span class="or-line"></span>
                                            <span class="or-title">{{ __('Pay With Payment Gateway') }}</span>
                                            <span class="or-line"></span>
                                        </div>
                                    </div>

                                    <div class="payment-form-wrapper">
                                        <div class="radio-wrapper">
                                            @foreach ($payment_gateways as $item)
                                                <div class="radio-item">
                                                    <input type="radio" id="radio2-{{ $item->alias }}" name="payment_gateway" value="{{ $item->alias }}">
                                                    <label for="radio2-{{ $item->alias }}"><img src="{{ get_image($item->image, 'payment-gateways') }}" alt="gateway"></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-xl-12 form-group pt-3">
                                        <div class="or-area">
                                            <span class="or-line"></span>
                                            <span class="or-title">{{ __('Or Pay with Debit & Credit Card') }}</span>
                                            <span class="or-line"></span>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 form-group">
                                        <input type="email" class="form--control" readonly placeholder="{{ __('Email') }}">
                                    </div>

                                    <div class="col-xl-12 form-group">
                                        <input type="text" class="form--control" readonly placeholder="{{ __('Name on card') }}">
                                    </div>

                                    <div class="col-xl-12 form-group">
                                        <div class="input-group two">
                                            <div class="input-group-text prepend">
                                                <img src="{{ asset('public/frontend/images/icon/credit-card.png') }}" alt="">
                                            </div>
                                            <input type="text" class="form--control" placeholder="{{ __('card Number') }}" name="card_name" value="{{ old('card_name') }}" readonly>
                                            <div class="input-group-text append">MM / YY / CVC</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <div class="preview-secure-group">
                                            <img src="{{ asset('public/frontend/images/icon/100-percent.png') }}" alt="">
                                            <p>{{ __('Securely save my information for 1-click checkout') }} <span>{{ __('Pay faster on') }} {{ Auth::user()->address->company_name ?? '' }} {{ __('and everywhere Link is accepted') }}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 form-group pt-10">
                                        <button type="submit" class="btn--base disabled active w-100" disabled>{{ __('Pay') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).on('change', 'select[name="currency"]', function(){
        let symbol = $(this).find(':selected').data('currency_symbol');
        $('.currency_link_symbol').text(symbol);
    })
    $(document).on('change keyup', 'input[name="price"]', function(){
        let price = $(this).val();
        $('.paylink_amount').val(price);
    })
    $(document).on('change keyup', 'input[name="quantity"]', function(){
        let quantity = $(this).val();
        $('.paylink_qty').text("("+quantity+")");
    })
</script>

@endpush
