@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start About
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="about-section pt-80">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                <div class="about-thumb">
                    <img src="{{ get_image(@$about->value->images->image_one, 'site-section') }}" alt="element">
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                <div class="about-thumb mb-10">
                    <img src="{{ get_image(@$about->value->images->image_two, 'site-section') }}" alt="element">
                </div>
                <div class="about-thumb">
                    <img src="{{ get_image(@$about->value->images->image_three, 'site-section') }}" alt="element">
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                <div class="about-thumb mb-10">
                    <img src="{{ get_image(@$about->value->images->image_four, 'site-section') }}" alt="element">
                </div>
                <div class="about-thumb">
                    <img src="{{ get_image(@$about->value->images->image_five, 'site-section') }}" alt="element">
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                <div class="about-thumb">
                    <img src="{{ get_image(@$about->value->images->image_six, 'site-section') }}" alt="element">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="about-content">
                    <h2 class="title">{{ @$about->value->language->$lang->heading??@$about->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$about->value->language->$lang->details??@$about->value->language->$default_lang->details??'' }}</p>
                </div>
                <div class="statistics-wrapper">
                    <div class="row mb-30-none">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="{{ formatNumberInKNotationValue(@$about->value->total_user ?? 0) }}">0</h3>
                                        <h3 class="title">{{ formatNumberInKNotationUnit(@$about->value->total_user ?? 0) }}</h3>
                                    </div>
                                    <p>{{ __('Total Users') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="{{ formatNumberInKNotationValue(@$about->value->total_transaction ?? 0) }}">0</h3>
                                        <h3 class="title">{{ formatNumberInKNotationUnit(@$about->value->total_transaction ?? 0) }}</h3>
                                    </div>
                                    <p>{{ __('Total Transactions') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                            <div class="statistics-item">
                                <div class="statistics-content">
                                    <div class="odo-area">
                                        <h3 class="odo-title odometer" data-odometer-final="{{ formatNumberInKNotationValue(@$about->value->total_gateway ?? 0) }}">0</h3>
                                        <h3 class="title">{{ formatNumberInKNotationUnit(@$about->value->total_gateway ?? 0) }}</h3>
                                    </div>
                                    <p>{{ __('Total Gateway') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End About
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="faq-section ptb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{ @$faq->value->language->$lang->heading??@$faq->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$faq->value->language->$lang->sub_heading??@$faq->value->language->$default_lang->sub_heading??'' }}</p>
                </div>
            </div>
        </div>
        <div class="faq-wrapper">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-6 col-lg-6 mb-30">
                    @if(isset($faq->value->items))
                        @foreach($faq->value->items ?? [] as $key => $item)
                            <div class="faq-item">
                                <h3 class="faq-title"><span class="title">{{ $item->language->$lang->question??$item->language->$default_lang->question??'' }}</span><span
                                        class="right-icon"></span></h3>
                                <div class="faq-content">
                                    <p>{{ $item->language->$lang->answer??$item->language->$default_lang->answer??'$item->language->$lang->answer' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection


@push("script")

@endpush
