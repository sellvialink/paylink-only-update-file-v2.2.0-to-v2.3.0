@extends('frontend.layouts.master')
@php
    $lang = get_default_language_code()??App\Constants\LanguageConst::NOT_REMOVABLE;
    $default_lang = App\Constants\LanguageConst::NOT_REMOVABLE;
@endphp
@section('content')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="blog-section ptb-80">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-8 mb-30">
                <div class="blog-item details">
                    <div class="blog-thumb">
                       <img src="{{ get_image($journal->image, 'web-journal') }}" alt="blog">
                    </div>
                    <div class="blog-content">
                        <span class="category">{{ $journal->category->name }}</span>
                        <h3 class="title">{{ @$journal->title->language->$lang->title??@$journal->title->language->$default_lang->title??'' }}</h3>
                        <p>{!! @$journal->details->language->$lang->details??@$journal->details->language->$default_lang->details??'' !!}</p>
                        <div class="blog-user-wrapper">
                            <div class="blog-user-thumb">
                                <img src="{{ get_image(@$journal->admin->image,'admin-profile') }}" alt="user">
                            </div>
                            <div class="blog-user-content">
                                <h6 class="title">{{ @$journal->admin->fullName }}</h6>
                                <span class="sub-title">{{ dateFormat('d F, Y', $journal->created_at) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.components.web-journal-aside', compact('categories','recent_journals','journals'))
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection


@push("script")

@endpush
