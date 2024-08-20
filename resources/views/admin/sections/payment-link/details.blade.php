@extends('admin.layouts.master')

@push('css')
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' =>  __($page_title),
    ])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{  __($page_title) }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form">
                <div class="row align-items-center mb-10-none">
                    <div class="col-xl-4 col-lg-4 form-group">
                        <ul class="user-profile-list-two">
                            <li class="one">{{ __("Date") }}: <span>{{ dateFormat('d M y h:i:s A', $data->created_at) }}</span></li>
                            <li class="two">{{ __('TRX ID') }}: <span>{{ @$data->trx_id }}</span></li>
                            <li class="three">{{ __('Email') }}: <span>{{ isset($data->user) ? $data->user->email : 'N/A' }}</span></li>
                            <li class="four">{{ __('Method') }}: <span>{{ @$data->type }}</span></li>
                            <li class="five">{{ __('Amount') }}: <span>{{ get_amount(@$data->request_amount,null,4) }} {{ @$data->details->charge_calculation->sender_cur_code }}</span></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <div class="user-profile-thumb">
                            @if (payment_gateway_const()::TYPE_CARD_PAYMENT  == $data->payment_type || $data->payment_type == null)
                                <img src="{{ asset('public/frontend/images/logo/link_icon.png') }}" alt="payment">
                            @else
                                <img src="{{ get_gateway_image($data->currency->payment_gateway_id) }}" alt="payment">
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 form-group">
                        <ul class="user-profile-list two">
                            <li class="one">{{__('Charge')}}: <span>{{ get_amount(@$data->charge->total_charge,null,4) }} {{ @$data->details->charge_calculation->sender_cur_code }}</span></li>
                            <li class="two">{{ __('After Charge') }}: <span>{{ get_amount(@$data->payable,null,4) }} {{ @$data->details->charge_calculation->sender_cur_code }}</span></li>
                            <li class="four">{{ __('Conversion Payable') }}: <span>{{ get_amount(@$data->conversion_payable,@$data->details->charge_calculation->receiver_currency_code,4) }} {{@$item->details->charge_calculation->sender_cur_code }}</span></li>
                            <li class="three">{{ __('Rate') }}: <span>1 {{ get_default_currency_code() }} = {{ get_amount(@$data->details->sender_currency->rate,@$data->details->sender_currency->currency_code,4) }} {{ @$data->currency->currency_code }}</span></li>
                            <li class="five">{{ __('Status') }}:  <span class="{{ @$data->stringStatus->class }}">{{ @$data->stringStatus->value }}</span></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('script')
@endpush
