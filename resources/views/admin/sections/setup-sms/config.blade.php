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
    ], 'active' => __("Setup SMS")])
@endsection

@section('content')
    <div class="custom-card">
        <div class="card-header">
            <h6 class="title">{{ __("SMS Method") }}</h6>
        </div>
        <div class="card-body">
            <form class="card-form" method="POST" action="{{ setRoute('admin.setup.sms.config.update') }}">
                @csrf
                @method("PUT")
                <div class="row mb-10-none">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row align-items-end">
                            <div class="col-xl-10 col-lg-10 form-group">
                                <label>{{ __("Name*") }}</label>
                                <select class="form--control nice-select" name="name" required>

                                    <option value="{{ $sms_config->name??'twilio' }}" @if (isset($sms_config->name) && $sms_config->name == "Twilio")
                                        @selected(true)
                                    @endif>{{ ucwords($sms_config->name??'Twilio') }}</option>
                                </select>
                                @error("name")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-2 col-lg-2 form-group">
                                @include('admin.components.link.custom',[
                                    'class'         => "btn--base modal-btn w-100",
                                    'href'          => "#test-mail",
                                    'text'          => __('Send Test Code'),
                                    'permission'    => "admin.setup.sms.test.sms.send",
                                ])
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        @include('admin.components.form.input',[
                            'label'     => __('Account SID')."*",
                            'name'      => 'twilio_account_sid',
                            'type'      => 'text',
                            'required'  => 'required',
                            'value'     => old('twilio_account_sid',$sms_config->twilio_account_sid ?? ""),
                        ])
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        @include('admin.components.form.input',[
                            'label'     => __('Auth Token')."*",
                            'name'      => 'twilio_auth_token',
                            'type'      => 'text',
                            'required'  => 'required',
                            'value'     => old('twilio_auth_token',$sms_config->twilio_auth_token ?? ""),
                        ])
                    </div>
                    <div class="col-xl-6 col-lg-6 form-group">
                        @include('admin.components.form.input',[
                            'label'     => __('From Number')."*",
                            'name'      => 'twilio_from_number',
                            'type'      => 'text',
                            'required'  => 'required',
                            'value'     => old('twilio_from_number',$sms_config->twilio_from_number ?? ""),
                        ])
                    </div>

                    <div class="col-xl-12 col-lg-12 form-group">
                        @include('admin.components.button.form-btn',[
                            'class'         => "w-100 btn-loading",
                            'text'          => __('Update'),
                            'permission'    => "admin.setup.sms.config.update",
                        ])
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Test mail send modal --}}
    @include('admin.components.modals.send-text-mail')

@endsection

@push('script')

@endpush
