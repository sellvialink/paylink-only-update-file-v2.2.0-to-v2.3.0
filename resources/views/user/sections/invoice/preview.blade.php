@extends('user.layouts.master')
@section('content')
<div class="body-wrapper payment-body-wrapper">
    <div class="custom-card payment-card justify-content-center">
        <div class="payment-preview-wrapper invoice-preview-wrapper invoice-pdf-wrapper">
            <div class="payment-invoice-box">
                <div class="payment-invoice-box-header">
                    <h3 class="title">Invoice</h3>
                    <h3 class="company-name">{{ @$invoice->title }}</h3>
                </div>
                <ul class="payment-invoice-box-list">
                    <li><span class="left">{{ __('Invoice number') }}</span> <span class="right"><b>{{ @$invoice->invoice_no }}</b></span></li>
                    <li><span class="left">{{ __('Date due') }}</span> <span class="right">{{ dateFormat('d F Y', $invoice->created_at) }}</span></li>
                </ul>
                <div class="payment-invoice-box-list-wrapper">
                    <ul class="payment-invoice-box-list">
                        <li><b>{{ @$invoice->title }}</b></li>
                        <li>{{ @$invoice->phone }}</li>
                    </ul>
                    <ul class="payment-invoice-box-list">
                        <h6 class="title">{{ __('Bill to') }}</h6>
                        <li>{{ @$invoice->name }}</li>
                        <li>{{ @$invoice->email }}</li>
                    </ul>
                </div>
                <div class="payment-invoice-price">
                    <h3 class="price">{{ $invoice->currency_symbol }}{{ get_amount(@$invoice->amount) }} {{ __('due') }} {{ dateFormat('d F Y', $invoice->created_at) }}</h3>
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
          @if ($invoice->status == 3)
            <div class="d-flex justify-content-center">
                <form action="{{ setRoute('user.invoice.status') }}" method="POST" class="me-2">
                    @csrf
                    <input type="hidden" name="status" value="3">
                    <input type="hidden" name="target" value="{{ $invoice->id }}">
                    <div class="submit-btn-wrapper text-center mt-30">
                        <button  class="btn--base active">{{ __('Save as Draft') }}</button>
                    </div>
                </form>
                <form action="{{ setRoute('user.invoice.status') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="2">
                    <input type="hidden" name="target" value="{{ $invoice->id }}">
                    <div class="submit-btn-wrapper text-center mt-30">
                        <button value="submit" class="btn--base">{{ __('Publish Invoice') }}</button>
                    </div>
                </form>
            </div>
            </div>
            @else
            <div class="d-flex justify-content-center">
                <div class="submit-btn-wrapper text-center mt-30">
                    <a href="{{ setRoute('user.invoice.share', $invoice->id) }}"  class="btn--base active">{{ __('Share Invoice') }}</a>
                </div>
            </div>
          @endif
    </div>
</div>
@endsection

@push('script')
@endpush
