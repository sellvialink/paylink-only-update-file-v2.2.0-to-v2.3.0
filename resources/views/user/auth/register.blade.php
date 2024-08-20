@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
    $register_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::REGISTER_SECTION);
    $register = App\Models\Admin\SiteSections::getData($register_slug)->first();
@endphp
@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="account-section ptb-80">
    <div class="account-area">
        <div class="account-form-area">
            <h5 class="title">{{ @$register->value->language->$lang->heading??@$register->value->language->$defualt_lang->heading??'' }}</h5>
            <p>{{ @$register->value->language->$lang->sub_heading??@$register->value->language->$defualt_lang->sub_heading??'' }}</p>
            <form method="POST" action="{{ route('user.register.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 form-group">
                        @include('admin.components.form.input',[
                            'name'        => "first_name",
                            'label'       => __('first Name').'*',
                            'placeholder' => __('first Name'),
                            'required'    => 'required',
                            'value'       => old("first_name"),
                        ])
                    </div>
                    <div class="col-lg-6 col-md-12 form-group">
                        @include('admin.components.form.input',[
                            'name'        => "last_name",
                            'label'       => __('last Name').'*',
                            'placeholder' => __('last Name'),
                            'required'    => 'required',
                            'value'       => old("last_name"),
                        ])
                    </div>
                    <div class="col-lg-12 form-group">
                        @include('admin.components.form.input',[
                            'name'        => "email",
                            'label'       => __('Email').'*',
                            'type'        => "email",
                            'placeholder' => __('email Address'),
                            'required'    => 'required',
                            'value'       => old("email"),
                        ])
                    </div>
                    <div class="col-lg-12 form-group">
                         <label>{{ __('Country') }}<span>*</span></label>
                        <select name="country" class="form--control py-0 w-100 select2-auto-tokenize" data-old="{{ old('country') }}" required>
                            <option selected disabled>{{ __('Select Country') }}</option>
                            @foreach ($exchange_rates as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 form-group">
                        @include('admin.components.form.input',[
                            'name'        => "company_name",
                            'label'       => __('Company Name').'*',
                            'placeholder' => __('Company Name'),
                            'required'    => 'required',
                            'value'       => old("company_name"),
                        ])
                    </div>
                    <div class="col-lg-12 form-group show_hide_password">
                        <label>{{ __('password') }}<span>*</span></label>
                        <input type="password" class="form-control form--control" name="password" placeholder="{{ __('password') }}" required>
                        <span class="show-pass"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>

                    @if (@$basic_settings->agree_policy == 1)
                        <div class="col-lg-12 form-group">
                            <div class="form-group custom-check-group mb-0">
                                <input type="checkbox" id="level-1" name="agree" required>
                                <label for="level-1">{{ __('I have agreed with') }} <a href="{{ route('page.view', 'privacy-policy') }}">{{ __('Terms Of Use & Privacy Policy') }}</a></label>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-100 btn-loading">{{ __('Register Now') }}</button>
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="account-item">
                            <label>{{ __('Already Have An Account?') }} <a href="{{ setRoute('user.login') }}" class="account-control-btn text--base" data-block="login">{{ __('Login Now') }}</a> -</label>
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
