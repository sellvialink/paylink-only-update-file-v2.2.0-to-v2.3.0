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
        <div class="account-form-area text-center">
            <h3 class="title">{{ __("Two Factor Authorization") }}</h3>
            <p>{{ __("Please enter your authorization code to access dashboard") }}</p>
            <form method="POST" class="account-form" action="{{ setRoute('user.authorize.google.2fa.submit') }}">
                @csrf
                <div class="row ml-b-20">
                    <div class="col-lg-12 form-group text-center">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(1)" maxlength="1" required="">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(2)" maxlength="2" required="">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(3)" maxlength="1" required="">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(4)" maxlength="1" required="">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(5)" maxlength="1" required="">
                        <input class="otp" type="text" name="code[]" oninput="digitValidate(this)" onkeyup="tabChange(6)" maxlength="1" required="">
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('Verify 2FA') }}</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="account-item">
                            <label>{{ __('Already Have An Account?') }} <a href="{{ setRoute('global.login') }}" class="account-control-btn">{{ __('Login Now') }}</a></label>
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
    <script>
          let digitValidate = function (ele) {
            ele.value = ele.value.replace(/[^0-9]/g, '');
        }

        let tabChange = function (val) {
            let ele = document.querySelectorAll('.otp');
            if (ele[val - 1].value != '') {
                ele[val].focus()
            } else if (ele[val - 1].value == '') {
                ele[val - 2].focus()
            }
        }
    </script>
@endpush
