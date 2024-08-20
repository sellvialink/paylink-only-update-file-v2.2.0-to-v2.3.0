@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <section class="account-section bg_img" data-background="{{ asset('public/frontend/images/element/account.png') }}">
        <div class="right float-end">
            <div class="account-middle">
                <div class="account-form-area">
                    <a class="site-logo site-title mb-30" href="{{ setRoute('index') }}">
                        <img src="{{ get_logo($basic_settings) }}"  data-white_img="{{ get_logo($basic_settings,'white') }}"
                        data-dark_img="{{ get_logo($basic_settings,'dark') }}"
                            alt="site-logo">
                    </a>
                    <h3 class="title">{{ __("KYC Verification") }}</h3>
                    <p>{{ __("Please submit your KYC information with valid data.") }}</p>
                    <form action="{{ setRoute('user.authorize.kyc.submit') }}" class="account-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row ml-b-20">

                            @include('user.components.generate-kyc-fields',['fields' => $kyc_fields])

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label>{{ __("Back to ") }}<a href="{{ setRoute('user.dashboard') }}" class="text--base">{{ __("Dashboard") }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="btn--base w-100">{{ __("Submit") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="account-footer text-center">
                <p>{{ __("Copyright") }} © {{ date("Y",time()) }} {{ __("All Rights Reserved.") }}</a></p>
            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
