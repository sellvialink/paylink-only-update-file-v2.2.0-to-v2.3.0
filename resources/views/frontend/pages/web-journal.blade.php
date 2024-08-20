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

                @foreach($journals as $key => $item)
                        <div class="blog-item mb-30">
                            <div class="blog-thumb">
                               <a href="{{ setRoute('web-journal.details', [$item->id,$item->slug]) }}"> <img src="{{ get_image($item->image, 'web-journal') }}" alt="blog"></a>
                            </div>
                            <div class="blog-content">
                                <span class="category">{{ $item->category->name }}</span>
                                <h3 class="title"><a href="{{ setRoute('web-journal.details', [$item->id,$item->slug]) }}">{{ @$item->title->language->$lang->title??@$item->title->language->$default_lang->title??'' }}</a></h3>
                                @php
                                    $description = strip_tags(@$item->details->language->$lang->details??@$item->details->language->$default_lang->details??'')
                                @endphp
                                <p>{!! Str::limit(@$description, 200, '...') !!}</p>
                                <div class="blog-user-wrapper">
                                    <div class="blog-user-thumb">
                                        <img src="{{ get_image(@$item->admin->image,'admin-profile') }}" alt="user">
                                    </div>
                                    <div class="blog-user-content">
                                        <h6 class="title">{{ @$item->admin->fullName }}</h6>
                                        <span class="sub-title">{{ dateFormat('d F, Y', $item->created_at) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                <nav>
                   {{ $journals->links() }}
                </nav>
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
