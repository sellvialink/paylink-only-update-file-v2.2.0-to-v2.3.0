@extends('frontend.layouts.master')

@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
    $login_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::LOGIN_SECTION);
    $login = App\Models\Admin\SiteSections::getData($login_slug)->first();
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="account-section ptb-80">
    <div class="account-bg"></div>
    <div class="account-area">
        <div class="account-form-area">
            <h5 class="title">{{ @$login->value->language->$lang->heading??@$login->value->language->$default_lang->heading??'' }}</h5>
            <p>{{ @$login->value->language->$lang->sub_heading??@$login->value->language->$default_lang->sub_heading??'' }}</p>
            <form action="{{ setRoute('user.login') }}" class="account-form" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>{{ __('Email') }}<span>*</span></label>
                        <input type="email" class="form-control form--control" name="credentials" placeholder="{{ __('Enter Email') }}..." value="{{ old('email') }}">
                    </div>
                    <div class="col-lg-12 form-group show_hide_password">
                        <label>{{ __('password') }}<span>*</span></label>
                        <input type="password" class="form-control form--control" name="password" placeholder="{{ __('Enter Password') }}...">
                        <span class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <div class="col-lg-12 form-group">
                        <div class="forgot-item text-end">
                            <label><a href="{{ setRoute('user.password.forgot') }}">{{ __('Forgot Password') }}?</a></label>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('Login In') }}</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="account-item">
                            <label>{{ __("No Account_web") }}? <a href="{{ setRoute('user.register') }}">{{ __('Register') }}</a></label>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="terms-item">
                            <label>{{ __('By clicking Login you are agreeing with our') }} <a href="{{ route('page.view', 'privacy-policy') }}">{{ __('Terms of Service') }}</a></label>
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


@push("script")
<script>
    $(".show_hide_password .show-pass").on('click', function(event) {
       event.preventDefault();
       if($(this).parent().find("input").attr("type") == "text"){
           $(this).parent().find("input").attr('type', 'password');
           $(this).find("i").addClass( "fa-eye-slash" );
           $(this).find("i").removeClass( "fa-eye" );
       }else if($(this).parent().find("input").attr("type") == "password"){
           $(this).parent().find("input").attr('type', 'text');
           $(this).find("i").removeClass( "fa-eye-slash" );
           $(this).find("i").addClass( "fa-eye" );
       }
});
</script>
@endpush
