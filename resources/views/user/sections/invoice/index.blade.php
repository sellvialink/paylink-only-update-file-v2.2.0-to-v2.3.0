@extends('user.layouts.master')

@push('css')
    <style>
        .btn--base.custom{
            padding: 8px 20px !important;
        }
    </style>
@endpush

@section('content')
<div class="body-wrapper">
    <div class="table-area">
        <div class="dashboard-header-wrapper">
            <h4 class="title">{{ __('Invoice Logs') }}</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <a href="{{ setRoute('user.invoice.create') }}" class="btn--base active"><i class="las la-plus me-1"></i> {{ __('Create Invoice') }}</a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{__('Invoice')}}</th>
                            <th>{{__('Customer Name')}}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Qty') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Due Date') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $item)
                            <tr>
                                <td class="text--primary show_invoice" data-target="{{ $item->id }}" style="cursor: pointer">#{{ @$item->invoice_no }}</td>
                                <td>{{ @$item->name }}</td>
                                <td>{{ @$item->email }}</td>
                                <td>{{ get_amount(@$item->amount, @$item->currency) }}</td>
                                <td>{{ @$item->qty }}</td>
                                <td><span class="badge {{ @$item->stringStatus->class }}">{{ @$item->stringStatus->value }}</span></td>
                                <td>{{ dateFormat('d M Y, h:i:s A', $item->created_at) }}</td>
                                <td>
                                   <div class="d-flex justify-content-end">
                                   @if ($item->status == 2)
                                    <div class="me-1">
                                        <button type="button" onclick="copyToClipBoard('copy-share-link-{{ $item->id }}')" class="btn--base btn"><i class="las la-clipboard"></i></button>
                                        <input type="hidden" id="copy-share-link-{{ $item->id }}" value="{{ setRoute('invoice.share', $item->token) }}">
                                    </div>
                                   @endif
                                    <div class="action-btn">
                                        <button type="button" class="btn--base btn"><i class="las la-ellipsis-v"></i></button>
                                        <ul class="action-list">
                                            @if ($item->status != 1)
                                                <li><a href="{{ setRoute('user.invoice.edit', $item->id) }}">{{ __('Edit') }}</a></li>
                                            @endif
                                            <li><button type="button" class="show_invoice" data-target="{{ $item->id }}" >{{ __('Show Invoice') }}</button></li>
                                            <li><a href="{{ setRoute('user.invoice.pdf.download', $item->id) }}">{{ __('Download') }}</a></li>
                                            @if ($item->status == 2)
                                                <li><button class="delete_btn" data-target="{{ $item->id }}" type="button">{{ __('Delete') }}</button></li>
                                            @endif
                                        </ul>
                                    </div>
                                   </div>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 7])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <nav>
            {{ $invoices->links() }}
        </nav>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="invoice_item_show_modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Invoice') }}</h5>
          <div class="dashboard-btn-wrapper">
                <a href="#" target="_blank" class="btn--base custom active download_invoice_btn"><i class="las la-cloud-download-alt"></i></i> {{ __('Download') }}</a>
                <a href="#" class="btn--base custom close_btn"><i class="las la-times-circle"></i> {{ __('Close') }}</a>
           </div>
        </div>
        <div class="modal-body p-0">
            <div class="payment-preview-wrapper invoice-preview-wrapper invoice_data_show p-0">

            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function copyToClipBoard(element) {
            var copyText = document.getElementById(element);
            copyText.select();
            navigator.clipboard.writeText(copyText.value);
            notification('success', 'URL Copied To Clipboard!');
        }
        $(document).ready(function () {
            $(".delete_btn").click(function(e){
                e.preventDefault();
                var target  = $(this).data('target');
                var actionRoute = "{{ route('user.invoice.delete') }}";
                openAlertModal(actionRoute,target);
            });

            $(document).on('click', '.show_invoice', function(){
                let target = $(this).data('target');

                $.ajax({
                    type: "POST",
                    url: "{{ route('user.invoice.show') }}",
                    data: {
                        target: target,
                        _token: _token,
                    },
                    dataType: "json",
                    success: function (response) {

                        let items = ``;

                        $.each(response.invoice.invoice_items, function (key, value) {
                            items += `<tr>
                                            <td>${value.title}</td>
                                            <td>${value.qty}</td>
                                            <td>${response.invoice.currency_symbol} ${value.price}</td>
                                            <td>${response.invoice.currency_symbol} ${value.price}</td>
                                        </tr>`;
                        });

                        let invoice_link;
                        if(response.invoice.status == 2){
                            invoice_link = `<a class="btn--base active w-100 mt-4" href="`+response.route+`">{{ __('Payment Now') }}</a>`;
                        }else if(response.invoice.status == 3){
                            invoice_link = `<buton type="button" class="btn--base w-100 mt-4">{{ __('Draft') }}</button>`;
                        }else{
                            invoice_link = `<buton type="button" class="btn--base w-100 mt-4">{{ __('Paid') }}</button>`;
                        }


                        let html_data = `<div class="payment-invoice-box">
                            <div class="payment-invoice-box-header">
                                <h3 class="title">{{ __('Invoice') }}</h3>
                                <h3 class="company-name">${response.invoice.title}</h3>
                            </div>
                            <ul class="payment-invoice-box-list">
                                <li><span class="left">Invoice number</span> <span class="right"><b>#${response.invoice.invoice_no}</b></span></li>
                                <li><span class="left">Date due</span> <span class="right"${response.date}</span></li>
                            </ul>
                            <div class="payment-invoice-box-list-wrapper">
                                <ul class="payment-invoice-box-list">
                                    <li><b class="company-name">${response.invoice.title}</b></li>
                                    <li class="phone">${response.invoice.phone}</li>
                                </ul>
                                <ul class="payment-invoice-box-list">
                                    <h6 class="title">{{ __('Bill to') }}</h6>
                                    <li class="customer_name">${response.invoice.name}</li>
                                    <li class="customer_email">${response.invoice.email}</li>
                                </ul>
                            </div>
                            <div class="payment-invoice-price">
                                <h3 class="price"><span class="dynamic_price">${response.invoice.currency_symbol}${parseFloat(response.invoice.amount).toFixed(2)}</span> due ${response.date}</h3>
                            </div>
                            <div class="payment-invoice-table">
                                <div class="table-wrapper">
                                    <div class="table-responsive">
                                        <table class="custom-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Title') }}</th>
                                                    <th>{{ __('Qty') }}</th>
                                                    <th>{{ __('Unit price') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="dynamic_items">
                                                ${items}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="payment-invoice-table-list-wrapper">
                                    <ul class="payment-invoice-table-list">
                                        <li>{{ __('Quantity') }} <span>${response.invoice.qty}</span></li>
                                        <li>{{ __('Subtotal') }} <span>${response.invoice.currency_symbol}${parseFloat(response.invoice.amount).toFixed(2)}</span></li>
                                        <li><b>{{ __('Amount due') }}</b> <span>${response.invoice.currency_symbol}${parseFloat(response.invoice.amount).toFixed(2)}</span></li>
                                    </ul>
                                    `+invoice_link+`
                                </div>
                                <div class="payment-invoice-footer">
                                    <p>#${response.invoice.invoice_no} - <span class="dynamic_price">${response.invoice.currency_symbol}${parseFloat(response.invoice.amount).toFixed(2)}</span> ${response.date}</p>
                                </div>
                            </div>
                        </div>`;

                        $('.download_invoice_btn').attr('href', response.download_route);
                        $('.invoice_data_show').html(html_data);
                        $('#invoice_item_show_modal').modal('show');
                    }
                });

            })

            $('.close_btn').click(function(){
                $('#invoice_item_show_modal').modal('hide');
            })
        });
    </script>
@endpush
