@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Money Out Logs")])
@endsection

@section('content')
<div class="table-area">
    <div class="table-wrapper">
        <div class="table-header">
            <h5 class="title">{{ $page_title }}</h5>
        </div>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>{{ __("TRX") }}</th>
                        <th>{{ __("Full Name") }}</th>
                        <th>{{ __("Phone") }}</th>
                        <th>{{ __("User Type") }}</th>
                        <th>{{ __("Request Amount") }}</th>
                        <th>{{ __("Method") }}</th>
                        <th>{{ __(("Status")) }}</th>
                        <th>{{ __("Time") }}</th>
                        <th>{{ __("Action") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions  as $key => $item)
                        <tr>
                            <td>{{ $item->trx_id }}</td>
                            <td>
                                @if($item->user_id != null)
                                <a href="{{ setRoute('admin.users.details',$item->user->username) }}">{{ $item->user->fullname }}</a>
                                @elseif($item->agent_id != null)
                                <a href="{{ setRoute('admin.agents.details',$item->user->username) }}">{{ $item->user->fullname }}</a>
                                @elseif($item->merchant_id != null)
                                <a href="{{ setRoute('admin.users.details',$item->user->username) }}">{{ $item->user->fullname }}</a>
                                @endif
                            </td>
                            <td>
                               {{ $item->user->full_mobile ?? 'N/A' }}
                            </td>
                            <td>
                                {{ __("USER") }}
                            </td>

                            <td>{{ number_format($item->request_amount,2) }} {{ @$item->details->data->sender_currency->currency_code }}</td>

                            <td><span class="text--info">{{ get_gateway_name($item->currency->payment_gateway_id) }}</span></td>
                            <td>
                                <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                            </td>
                            <td>{{ $item->created_at->format('d-m-y h:i:s A') }}</td>
                            <td>
                                @include('admin.components.link.info-default',[
                                    'href'          => setRoute('admin.money.out.details', $item->id),
                                    'permission'    => "admin.money.out.details",
                                ])

                            </td>
                        </tr>
                    @empty
                        @include('admin.components.alerts.empty', ['colspan' => 9])
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ get_paginate($transactions) }}
    </div>
</div>
@endsection

@push('script')

@endpush
