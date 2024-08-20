@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Map
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="map-wrapper">
    <div class="map-area">
        {!! @$contact_us->value->embed_map !!}
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Map
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="contact-section ptb-80">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row justify-content-center align-items-center mb-30-none">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="contact-widget-item-wrapper">
                        <div class="contact-header">
                            <h2 class="section-title">{{ @$contact_us->value->language->$lang->heading??@$contact_us->value->language->$default_lang->heading??'' }}</h2>
                            <p>{{ @$contact_us->value->language->$lang->sub_heading??@$contact_us->value->language->$default_lang->sub_heading??'' }}</p>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/') }}/images/icon/tracking.svg" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">{{ __('Address') }}</h5>
                                <p>{{ @$contact_us->value->language->$lang->address??@$contact_us->value->language->$default_lang->address??'' }}</p>
                            </div>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/') }}/images/icon/call.svg" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">{{ __('Phone') }}</h5>
                                <p>{{ @$contact_us->value->language->$lang->phone??@$contact_us->value->language->$default_lang->phone??'' }}</p>
                            </div>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/') }}/images/icon/mail.svg" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">{{__('Email')}}</h5>
                                <p>{{ @$contact_us->value->language->$lang->email??@$contact_us->value->language->$default_lang->email??'' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="contact-form-area">
                        <div class="contact-header">
                            <h5 class="title">{{ @$contact_us->value->language->$lang->heading_two??@$contact_us->value->language->$default_lang->heading_two??'' }}</h5>
                            <p>{{ @$contact_us->value->language->$lang->sub_heading_two??@$contact_us->value->language->$default_lang->sub_heading_two??'' }}</p>
                        </div>
                        <form class="contact-form" id="contact-form">
                            @csrf
                            <div class="row justify-content-center mb-10-none">
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>{{ __('Name') }}<span>*</span></label>
                                    <input type="text" name="name" class="form--control" placeholder="{{ __('Enter your name') }}" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>{{ __('Email') }}<span>*</span></label>
                                    <input type="email" name="email" class="form--control" placeholder="{{ __('Enter your email_web') }}" required>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 form-group">
                                    <label>{{ __('Subject') }}<span>*</span></label>
                                    <input type="text" name="subject" class="form--control" placeholder="{{ __('Subject') }}" required>
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group">
                                    <label>{{ __('Message') }}<span>*</span></label>
                                    <textarea class="form--control" name="message" placeholder="{{ __('Enter your message') }}"></textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button type="submit" class="btn--base active mt-10 contact-btn">{{ __('Send Message') }}
                                        <i class="fa fa-spinner d-none"></i>
                                    <button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection


@push("script")

@endpush
