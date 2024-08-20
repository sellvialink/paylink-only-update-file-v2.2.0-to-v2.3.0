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
            <h3 class="title text-center">{{ __('Please enter the code') }}</h3>
            <p class="text-center">{{ __('We sent a 6 digit code here') }} <span class="text--base">{{ $user_email }}</span></p>
            <form method="POST" class="account-form" action="{{ setRoute('user.authorize.mail.verify',$token) }}">
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
                        <div class="time-area">{{ __("Didn't get the code?") }} <span id="time"> </span></div>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('Verify Mail') }}</button>
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

        var resendTime = "{{ $resend_time ?? 0 }}";
        var resendCodeLink = "{{ setRoute('user.authorize.mail.resend',$token) }}";

        function resetTime (second = 20) {
            var coundDownSec = second;
            var countDownDate = new Date();
            countDownDate.setMinutes(countDownDate.getMinutes() + 120);
            var x = setInterval(function () {  // Get today's date and time
                var now = new Date().getTime();  // Find the distance between now and the count down date
                var distance = countDownDate - now;  // Time calculations for days, hours, minutes and seconds  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * coundDownSec)) / (1000 * coundDownSec));
                var seconds = Math.floor((distance % (1000 * coundDownSec)) / 1000);  // Output the result in an element with id="time"
                document.getElementById("time").innerHTML =seconds + "s ";  // If the count down is over, write some text
                console.log(distance);
                if (distance < 0 || second < 2 ) {
                    // alert();
                    clearInterval(x);
                    // document.getElementById("time").innerHTML = "RESEND";
                    document.querySelector(".time-area").innerHTML = "Didn't get the code? <a class='text--danger' href='${resendCodeLink}'>Resend</a>";
                }
                second--
            }, 1000);
        }

        resetTime();
    </script>
@endpush
