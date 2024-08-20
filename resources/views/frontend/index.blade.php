@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="banner-section">
    <div class="banner-thumb">
        <img src="{{ get_image(@$home_banner->value->images->banner_image,'site-section') }}" alt="banner">
    </div>
    <div class="container">
            <div class="col-xl-5 col-lg-6 col-md-8 mb-30">
                <div class="banner-content">
                    <span class="sub-title">{{ @$home_banner->value->language->$lang->title??@$home_banner->value->language->$default_lang->title??'' }}
                        <svg class="HoverArrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="HoverArrow__linePath" d="M0 5h7"></path>
                                <path class="HoverArrow__tipPath" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </span>
                    <h1 class="title">{{ @$home_banner->value->language->$lang->heading??@$home_banner->value->language->$default_lang->heading??"" }}</h1>
                    <p>{{ @$home_banner->value->language->$lang->sub_heading??@$home_banner->value->language->$default_lang->sub_heading??'' }}</p>
                    <div class="banner-btn">
                        <a href="{{ url('/') }}/{{ @$home_banner->value->primary_button_link }}" class="btn--base">{{ @$home_banner->value->language->$lang->primary_button_name??@$home_banner->value->language->$default_lang->primary_button_name??'' }}
                            <svg class="HoverArrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                                <g fill-rule="evenodd">
                                    <path class="HoverArrow__linePath" d="M0 5h7"></path>
                                    <path class="HoverArrow__tipPath" d="M1 1l4 4-4 4"></path>
                                </g>
                            </svg>
                        </a>
                        <a href="{{ url('/') }}/{{ @$home_banner->value->secondary_button_link }}" class="btn--base active">{{ @$home_banner->value->language->$lang->secondary_button_name??@$home_banner->value->language->$default_lang->secondary_button_name??'' }}
                            <svg class="HoverArrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                                <g fill-rule="evenodd">
                                    <path class="HoverArrow__linePath" d="M0 5h7"></path>
                                    <path class="HoverArrow__tipPath" d="M1 1l4 4-4 4"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="security-section ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="section-header">
                    <h2 class="section-title">{{ @$security_section->value->language->$lang->heading??@$security_section->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$security_section->value->language->$lang->sub_heading??@$security_section->value->language->$default_lang->sub_heading??'' }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @if(isset($security_section->value->items))
                @foreach($security_section->value->items ?? [] as $key => $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                        <div class="security-item">
                            <div class="security-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="security-content">
                                <h4 class="title">{{ @$item->language->$lang->name??@$item->language->$default_lang->name??'' }}</h4>
                                <p>{{ @$item->language->$lang->details??@$item->language->$default_lang->details??'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Security
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="how-it-works-section bg--gray ptb-80">
    <div class="container">
        <div class="how-it-works-area">
            @if(isset($how_works_section->value->items))
                @php
                    $count = 0;
                @endphp
                @foreach($how_works_section->value->items ?? [] as $key => $item)
                @php
                    $rtl_check = $count % 2;
                @endphp

                @if ($rtl_check == 0)
                    <div class="how-it-works-wrapper">
                        <div class="row justify-content-center align-items-center mb-30-none">
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="how-it-works-thumb">
                                    <img class="main-img" src="{{ get_image($item->image, 'site-section') }}" alt="element">
                                    <div class="how-it-works-thumb-element-one">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-1.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-two">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-2.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-three">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-3.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-four">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-4.webp" alt="element">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="how-it-works-left-content">
                                    <h3 class="title">{{ @$item->language->$lang->title??@$item->language->$default_lang->title??'' }}</h3>
                                    <p>{{ @$item->language->$lang->details??@$item->language->$default_lang->details??'' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="how-it-works-wrapper rtl">
                        <div class="row justify-content-center align-items-center mb-30-none">
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="how-it-works-left-content">
                                    <h3 class="title">{{ @$item->language->$lang->title??@$item->language->$default_lang->title??'' }}</h3>
                                    <p>{{ @$item->language->$lang->details??@$item->language->$default_lang->details??'' }}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="how-it-works-thumb-two">
                                    <img class="main-img" src="{{ get_image($item->image, 'site-section') }}" alt="element">
                                    <div class="how-it-works-thumb-element-one">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-5.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-two">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-2.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-three">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-3.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-four">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-3.webp" alt="element">
                                    </div>
                                    <div class="how-it-works-thumb-element-five">
                                        <img src="{{ asset('public/frontend/') }}/images/element/step-shape-6.webp" alt="element">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @php
                    $count++;
                @endphp
                @endforeach
            @endif
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End How it works
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="testimonial-section pt-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{ @$testimonial->value->language->$lang->heading??@$testimonial->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$testimonial->value->language->$lang->sub_heading??@$testimonial->value->language->$default_lang->sub_heading??'' }}</p>
                </div>
            </div>
        </div>
        <div class="testimonial-wrapper">
            <div class="testimonial-slider">
                <div class="swiper-wrapper">

                    @if(isset($testimonial->value->items))
                        @foreach($testimonial->value->items ?? [] as $key => $item)
                        <div class="swiper-slide">
                            <div class="row justify-content-center align-items-center mb-30-none">
                                <div class="col-xl-5 col-lg-6 mb-30">
                                    <div class="testimonial-thumb">
                                        <img src="{{ asset('public/frontend/') }}/images/testimonial/testimonial-bg-2.png" alt="testimonial">
                                        <div class="testimonial-inner-thumb">
                                            <img src="{{ get_image(@$item->image, 'site-section') }}" alt="testimonial">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6 mb-30">
                                    <div class="testimonial-content">
                                        <div class="testimonial-user-wrapper">
                                            <div class="testimonial-quote-wrapper">
                                                <div class="testimonial-quote-icon">
                                                    <svg height="80" viewBox="0 0 30 30" width="80" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_11027177"><g id="content" fill="none" fill-rule="evenodd"><g id="content_041-open_quote-text-type-editor" fill="#000" transform="translate(-45 -225)"><path d="m54.4334094 243.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4zm14.4320018 5.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4z" transform="matrix(-1 0 0 -1 121.001 481.001)"></path></g></g></svg>
                                                </div>
                                            </div>
                                            <h5 class="title">{{ @$item->language->$lang->name??@$item->language->$default_lang->name??'' }}-</h5>
                                            <span class="sub-title">{{ @$item->language->$lang->designation??@$item->language->$default_lang->designation??'' }}</span>
                                            <div class="ratings">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($item->review_rating - $i >= 1)
                                                    {{-- Full Start --}}
                                                    <i class="fas fa-star"> </i>
                                                    @elseif($item->review_rating - $i > 0)
                                                    {{--Half Start--}}
                                                    <i class="fas fa-star-half-alt"> </i>
                                                    @else
                                                    {{--Empty Start--}}
                                                    <i class="far fa-star"> </i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <h4 class="title">{{ @$item->language->$lang->title??@$item->language->$default_lang->title??'' }}</h4>
                                        <p>{{ @$item->language->$lang->details??@$item->language->$default_lang->details??'' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-7 offset-xl-5 col-lg-6 offset-lg-6">
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="app-section ptb-80">
    <div class="container">
        <div class="app-wrapper">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="app-thumb">
                        <img src="{{ get_image(@$download->value->images->image, 'site-section') }}" alt="element">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="app-content">
                        <span class="sub-title">{{ @$download->value->language->$lang->title??@$download->value->language->$default_lang->title??'' }}</span>
                        <h2 class="title">{{ @$download->value->language->$lang->heading??@$download->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$download->value->language->$lang->sub_heading??@$download->value->language->$default_lang->sub_heading??'' }}</p>
                        <div class="app-btn-wrapper">
                            <a href="{{ $app_settings->android_url }}" class="app-btn">
                                <div class="icon">
                                    <i class="fab fa-google-play text-white"></i>
                                </div>
                                <div class="content">
                                    <span>{{ __('Get It On') }}</span>
                                    <h6 class="title">{{ __('Google Play') }}</h6>
                                </div>
                                <div class="app-qr">
                                    <img src="{{ get_image(@$download->value->images->play_store_image, 'site-section') }}" alt="element">
                                </div>
                            </a>
                            <a href="{{ $app_settings->ios_url }}" class="app-btn">
                                <div class="icon">
                                    <i class="fab fa-apple text-white"></i>
                                </div>
                                <div class="content">
                                    <span>{{ __('Download On The') }}</span>
                                    <h6 class="title">{{ __('Apple Store') }}</h6>
                                </div>
                                <div class="app-qr">
                                    <img src="{{ get_image(@$download->value->images->app_store_image, 'site-section') }}" alt="element">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection


@push("script")

@endpush
