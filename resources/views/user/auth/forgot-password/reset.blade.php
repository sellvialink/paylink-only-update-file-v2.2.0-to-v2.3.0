@extends('frontend.layouts.master')

@php
    $defualt = get_default_language_code()??'en';
    $auth_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    $auth = App\Models\Admin\SiteSections::getData( $auth_slug)->first();
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
            <h3 class="title">{{ __('Set New Password') }}</h3>
            <p>{{ __('reset_desc') }}.</p>
            <form class="account-form" action="{{ setRoute('user.password.reset',$token) }}" method="POST">
                @csrf
                <div class="row ml-b-20">
                    <div class="col-lg-12 form-group show_hide_password">
                        <label>{{ __('password') }}<span>*</span></label>
                        <input type="password" class="form-control form--control" name="password" placeholder="{{ __('Enter Password') }}...">
                        <span class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-lg-12 form-group show_hide_password">
                        <label>{{ __('Confirm Password') }}<span>*</span></label>
                        <input type="password" class="form-control form--control" name="password_confirmation" placeholder="{{ __('Enter Password') }}...">
                        <span class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('reset Password') }}</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="account-item">
                            <label>{{ __('Already Have An Account') }}? <a href="{{ setRoute('user.login') }}" class="account-control-btn">{{ __('Login
                                Now') }}</a></label>
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
