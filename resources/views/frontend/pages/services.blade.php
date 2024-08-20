@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Service
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="service-section ptb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{ @$service->value->language->$lang->heading??@$service->value->language->$default_lang->heading??'' }}</h2>
                    <p>{{ @$service->value->language->$lang->sub_heading??@$service->value->language->$default_lang->sub_heading??'' }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @if(isset($service->value->items))
                @foreach($service->value->items ?? [] as $key => $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="{{ @$item->icon }}"></i>
                            </div>
                            <div class="service-content">
                                <h4 class="title">{{ @$item->language->$lang->name??@$item->language->$default_lang->name??'' }}</h4>
                                <p>{{ @$item->language->$lang->details??@$item->language->$default_lang->details??'' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Service
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection


@push("script")

@endpush
