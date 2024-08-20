@extends('frontend.layouts.master')
@php
    $defualt = get_default_language_code()??'en';
    $login_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    $login = App\Models\Admin\SiteSections::getData($login_slug)->first();
    $footer_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer = App\Models\Admin\SiteSections::getData($footer_slug)->first();
@endphp
@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="account-section ptb-80">
    <div class="account-bg"></div>
    <div class="account-area">
        <div class="account-form-area">
            <h3 class="title">{{ __('Reset Your Forgotten Password') }}</h3>
            <p>{{ __('forgot_desc') }}</p>
            <form class="account-form" action="{{ setRoute('user.password.forgot.send.code') }}" method="POST">
                @csrf
                <div class="row ml-b-20">
                    <div class="col-lg-12 form-group">
                        <input type="email" class="form--control" placeholder="{{ __('enter Email') }}" name="credentials" required>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('Send OTP') }}</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="account-item">
                            <label>{{ __('Already Have An Account') }}? <a href="{{ setRoute('user.login') }}" class="account-control-btn">{{ __('Login Now') }}</a></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection

@push('script')

@endpush
