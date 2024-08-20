@extends('user.layouts.master')

@section('content')
<div class="body-wrapper">
    <div class="row mb-20-none">
        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="card-body">
                    <form class="card-form" method="post" action="{{ setRoute('user.security.google.2fa.status.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __('Address') }}<span>*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form--control" value="{{ auth()->user()->two_factor_secret }}" readonly>
                                    <div class="input-group-text"><i class="las la-clipboard"></i></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <div class="qr-code-thumb text-center">
                                    <img class="mx-auto" src="{{ asset('public/frontend/') }}/images/site-section/6dd6beb9-a876-4e53-b229-d2b32c8d0b6c.webp">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            @if (auth()->user()->two_factor_status)
                                <button type="button" class="btn--base bg--warning w-100 active-deactive-btn active">{{ __("Disable") }}</button>
                                <br>
                                <div class="text--danger mt-3">{{ __("Don't forget to add this application in your google authentication app. Otherwise you can't login in your account.") }}</div>
                            @else
                                <button type="button" class="btn--base w-100 active-deactive-btn active">{{ __("Enable") }}</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-20">
            <div class="custom-card mt-10">
                <div class="card-body">
                    <h4 class="mb-3">{{ __('Download Google Authenticator App') }}</h4>
                    <p>{{ __('Google Authenticator_desc') }} <a href="https://support.google.com/accounts/answer/1066447?hl=en&co=GENIE.Platform=Android" class="text--base" target="_blanck">{{ __('How to setup') }}?</a></p>
                    <div class="play-store-thumb text-center mb-20">
                        <img class="mx-auto" src="{{ asset('public/frontend/') }}/images/element/autenticator.png">
                    </div>
                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" class="btn--base active mt-10 w-100 btn-loading" target="_blanck"><i class="fab fa-google-play me-1"></i> {{ __('Download For Android') }}</a>
                    <a href="https://apps.apple.com/us/app/google-authenticator/id388497605" class="btn--base active mt-10 w-100 btn-loading" target="_blanck"><i class="fab fa-apple me-1"></i> {{ __('Download For IOS') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(".active-deactive-btn").click(function(){
            var actionRoute =  "{{ setRoute('user.security.google.2fa.status.update') }}";
            var target      = 1;
            var btnText = $(this).text();
            var message     = `{{ __('Are you sure to') }} <strong>${btnText}</strong> 2 factor authentication (Powered by google)?`;
            openAlertModal(actionRoute,target,message,btnText,"POST");
        });
    </script>
@endpush
