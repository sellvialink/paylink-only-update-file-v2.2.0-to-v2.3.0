@extends('user.layouts.master')

@section('content')
<div class="body-wrapper payment-body-wrapper">
    <div class="custom-card payment-card">
        <form action="{{ setRoute('user.invoice.store') }}" class="payment-invoice-wrapper payment-type-wrapper" method="POST">
            @csrf
            <input type="hidden" name="invoice_no" value="{{ $invoice_no }}">
            <input type="hidden" name="currency_symbol" value="">
            <input type="hidden" name="country" value="">
            <input type="hidden" name="total_qty" value="">
            <input type="hidden" name="total_price" value="">
            <input type="hidden" name="currency_name" value="">

            <div class="payment-invoice-form">
                <h3 class="title">{{ __('Customer') }}</h3>
                <div class="row">
                    <div class="col-xl-12 form-group">
                        <label>{{ __('Title') }}*</label>
                        <input type="text" class="form--control" value="{{ Auth::user()->address->company_name ?? '' }}" name="title" required placeholder="{{ __('Title') }}">
                    </div>
                    <div class="col-xl-12 form-group">
                        <label>{{ __('Phone') }}*</label>
                        <input type="number" class="form--control" value="{{ Auth::user()->mobile ?? '' }}" name="phone" required placeholder="{{ __('Phone') }}">
                    </div>
                    <div class="col-xl-12 form-group">
                        <label>{{ __('Customer Name') }}*</label>
                        <input type="text" class="form--control" value="{{ Auth::user()->fullname ?? '' }}" name="name" required placeholder="{{ __('Name') }}">
                    </div>
                    <div class="col-xl-12 form-group">
                        <label>{{ __('Customer Email') }}*</label>
                        <input type="email" class="form--control" value="" name="email" required placeholder="{{ __('Customer Email') }}">
                    </div>
                    <div class="col-xl-12 form-group">
                        <label>{{ __('Currency') }}</label>
                        <select class="select2-auto-tokenize currency_link w-100" name="currency">
                            <option value="" disabled selected>{{ __('Select One') }}</option>
                            @foreach ($currency_data as $item)
                                <option value="{{ $item->code }}" data-country="{{ $item->country }}" data-currency_name="{{ $item->name }}" data-currency_code="{{ $item->code }}" data-currency_symbol="{{ $item->symbol }}">{{ $item->code. ' ('. $item->name.')' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="payment-invoice-items-form">
                <div class="payment-invoice-items-form-header">
                    <h3 class="title">{{ __('Items') }}</h3>
                    <button type="button" class="btn--base active add-row-btn float-end"><i class="las la-plus me-1"></i> {{ __('Add') }}</button>
                </div>
                <div class="results"></div>
                <div class="row add-row-wrapper align-items-end mt-20">
                    <div class="col-xl-4 col-lg-5 col-md-5 form-group">
                        <label>{{ __('Title') }}*</label>
                        <input type="text" class="form--control item_title" name="item_title[]" value="{{ __('Collecting Payment Platform') }}" required>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 form-group">
                        <label>{{ __('Quantity') }}*</label>
                        <input type="number" class="form--control item_qty" value="1" name="item_qty[]" required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 form-group">
                        <label>{{ __('price') }}*</label>
                        <div class="input-group">
                            <div class="input-group-text prepend item_currency">$</div>
                            <input type="number" class="form--control item_price" value="100.00" name="item_price[]" required>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-1 col-md-1 form-group">
                        <button type="button" class="btn--base bg--danger invoice-cross-btn w-100"><i class="las la-times"></i></button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn--base active mt-20 w-100 btn-loading">{{__('Create Invoice')}}</button>
        </form>
        <div class="payment-preview-wrapper invoice-preview-wrapper">
            <div class="payment-header">
                <h3 class="title">{{ __('Preview') }}</h3>
            </div>
            <div class="payment-invoice-box">
                <div class="payment-invoice-box-header">
                    <h3 class="title">{{ __('Invoice') }}</h3>
                    <h3 class="company-name">{{ Auth::user()->address->company_name ?? '' }}</h3>
                </div>
                <ul class="payment-invoice-box-list">
                    <li><span class="left">{{ __('Invoice number') }}</span> <span class="right"><b>{{ $invoice_no }}</b></span></li>
                    <li><span class="left">{{ __('Date due') }}</span> <span class="right">{{ dateFormat('d F Y', Carbon\Carbon::now()) }}</span></li>
                </ul>
                <div class="payment-invoice-box-list-wrapper">
                    <ul class="payment-invoice-box-list">
                        <li><b class="company-name">{{ Auth::user()->address->company_name ?? '' }}</b></li>
                        <li class="phone">{{ Auth::user()->mobile }}</li>
                    </ul>
                    <ul class="payment-invoice-box-list">
                        <h6 class="title">{{ __('Bill to') }}</h6>
                        <li class="customer_name">{{ Auth::user()->fullname ?? '' }}</li>
                        <li class="customer_email">{{ Auth::user()->email ?? '' }}</li>
                    </ul>
                </div>
                <div class="payment-invoice-price">
                    <h3 class="price"><span class="dynamic_price">$100.00</span> due {{ dateFormat('d F Y', Carbon\Carbon::now()) }}</h3>
                </div>
                <div class="payment-invoice-table">
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
                                <tbody class="dynamic_items">
                                    <tr>
                                        <td>Collecting Payment Platform</td>
                                        <td>1</td>
                                        <td>$100.00</td>
                                        <td>$100.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="payment-invoice-table-list-wrapper">
                        <ul class="payment-invoice-table-list">
                            <li>{{ __('Quantity') }} <span>1</span></li>
                            <li>{{ __('Subtotal') }} <span>$100.00</span></li>
                            <li><b>{{ __('Amount due') }}</b> <span>$100.00</span></li>
                        </ul>
                        <a class="btn--base active w-100 mt-4" href="#">{{ __('Payment Now') }}</a>
                    </div>
                    <div class="payment-invoice-footer">
                        <p>{{ $invoice_no }} - <span class="dynamic_price">$100.00</span> {{ dateFormat('d F Y', Carbon\Carbon::now()) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>

        let currency = '$';

        $(document).ready(function () {

            $('.currency_link').on('change', function(){
                var element = '.currency_link';
                var currencyCode = $(element+" :selected").attr("data-currency_code");
                var currencySymbol = $(element+" :selected").attr("data-currency_symbol");
                currency = currencySymbol;
                var currencyName = $(element+" :selected").attr("data-currency_name");
                var country = $(element+" :selected").attr("data-country");


                $('input[name="currency_name"]').val(currencyName);
                $('input[name="currency_symbol"]').val(currencySymbol);
                $('input[name="country"]').val(country);

                $('.item_currency').text(currency);

                dynamicItem();
            });

            $('.item_currency').text(currency);
        });

        $('.payment-invoice-items-form').on('click', '.add-row-btn', function() {
            var clonedRow = $('.add-row-btn').closest('.payment-invoice-items-form').find('.add-row-wrapper').last().clone().show().appendTo('.results');
            dynamicItem();
        });

        $(document).on('click','.invoice-cross-btn', function (e) {
            e.preventDefault();
            let wrapper = $('.add-row-wrapper').length;
            if(wrapper > 1){
                $(this).parent().parent().remove();
            }else{
                notification('danger', 'Can not delete last item!');
            }
            dynamicItem();
        });


        function dynamicItem(){

            let table_html = ``;
            let subtotal_html = ``;
            let total_qty = 0;
            let subtotal = 0;
            let precesion = 2;

            $('.add-row-wrapper').each(function (key, value) {
                let title    = $(this).find('.item_title').val();
                let qty      = $(this).find('.item_qty').val();

                let price    = $(this).find('.item_price').val();
                price = parseFloat(price).toFixed(precesion);

                let unit_price = currency+''+price;
                let t_price = currency+''+parseFloat(price*qty).toFixed(precesion);

                let qty_cal = parseFloat(qty);
                let total_price_cal = parseFloat(price*qty).toFixed(precesion);

                total_qty += qty_cal;
                subtotal += total_price_cal;


                table_html += `<tr>
                                <td>${title}</td>
                                <td>${qty}</td>
                                <td>${unit_price}</td>
                                <td>${t_price}</td>
                            </tr>`;

                $('.dynamic_items').html(table_html)
            });

            $('input[name="total_qty"]').val(total_qty);

            subtotal = parseFloat(subtotal).toFixed(precesion)

            $('input[name="total_price"]').val(subtotal);

            subtotal_t = currency+''+subtotal;
            subtotal_html = `<li>{{ __('Quantity') }} <span>${total_qty}</span></li>
                                <li>{{ __('Subtotal') }} <span>${subtotal_t}</span></li>
                                <li><b>{{ __('Amount due') }}</b> <span>${subtotal_t}</span></li>`;

            $('.dynamic_price').text(subtotal_t);
            $('.payment-invoice-table-list').html(subtotal_html);

        }

        $(document).ready(function () {

            $('input[name="title"]').on('keyup', function(){
                let title = $(this).val();
                $('.company-name').text(title);
            });
            $('input[name="name"]').on('keyup', function(){
                let title = $(this).val();
                $('.customer_name').text(title);
            });
            $('input[name="email"]').on('keyup', function(){
                let title = $(this).val();
                $('.customer_email').text(title);
            });
            $('input[name="phone"]').on('keyup', function(){
                let title = $(this).val();
                $('.phone').text(title);
            });


            $(document).on('keyup', '.add-row-wrapper .item_title', function(){
                dynamicItem();
            })
            $(document).on('keyup, change', '.add-row-wrapper .item_qty', function(){
                dynamicItem();
            })
            $(document).on('keyup', '.add-row-wrapper .item_price', function(){
                dynamicItem();
            })

        });
    </script>
@endpush
