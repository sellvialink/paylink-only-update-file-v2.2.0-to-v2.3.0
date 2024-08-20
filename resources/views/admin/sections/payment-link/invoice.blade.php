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
        'active' => __($page_title),
    ])
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
                            <th>{{__('User Email')}}</th>
                            <th>{{__('Invoice')}}</th>
                            <th>{{__('Customer Name')}}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Qty') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Due Date') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $item)
                        <tr>
                            <td>{{ $item->user->email }}</td>
                            <td class="text--primary show_invoice" data-target="{{ $item->id }}" style="cursor: pointer">#{{ @$item->invoice_no }}</td>
                            <td>{{ @$item->name }}</td>
                            <td>{{ @$item->email }}</td>
                            <td>{{ get_amount(@$item->amount, @$item->currency) }}</td>
                            <td>{{ @$item->qty }}</td>
                            <td>{{ get_amount((@$item->qty * $item->amount),  @$item->currency) }}</td>
                            <td><span class="badge {{ @$item->stringStatus->class }}">{{ @$item->stringStatus->value }}</span></td>
                            <td>{{ dateFormat('d M Y, h:i:s A', $item->created_at) }}</td>
                            <td>
                                @include('admin.components.link.info-default',[
                                    'href'          => setRoute('admin.invoice.download', $item->id),
                                    'permission'    => "admin.invoice.download",
                                    'icon' => "las la-cloud-download-alt",
                                ])
                            </td>
                        </tr>
                    @empty
                        @include('admin.components.alerts.empty',['colspan' => 9])
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ get_paginate($invoices) }}
        </div>
    </div>
@endsection

@push('script')
@endpush
