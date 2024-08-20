@php
    $cookie_accepted = session()->get('cookie_accepted');
    $cookie_decline = session()->get('cookie_decline');
@endphp
<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name ="description", content="{{ @$seo_settings->desc }}">
    <meta name ="keywords", content="{{ @$seo_settings->tags ? implode(", ", @$seo_settings->tags) : '' }}">
    <meta name="author" content="{{ config('app.name') }}"/>
    <meta name="application-name" content="{{ $basic_settings->sitename($page_title??'') }}">

    <meta property="og:title" content="{{ $basic_settings->sitename($page_title??'') }}">
    <meta property="og:description" content="{{ @$seo_settings->desc }}">
    <meta property="og:image" content="{{ get_fav($basic_settings) }}">
    <meta property="og:image:width" content="120">
    <meta property="og:image:height" content="80">

    <title>{{ $basic_settings->sitename(__($page_title??'')) }}</title>
    @include('partials.header-asset')
    @stack('css')
</head>
<body class="{{ selectedLangDir() ?? "ltr"}}">
@include('frontend.partials.preloader')
@include('frontend.partials.scroll-to-top')
@include('frontend.partials.header')

@yield("content")

@include('frontend.partials.footer')
@include('partials.footer-asset')
@include('admin.partials.notify')
@include('frontend.partials.extensions.tawk-to')
@include('frontend.partials.site-cookie')
@stack('script')

<script>

    $(document).ready(function () {
        $(".language-select").change(function(){
            var submitForm = `<form action="{{ setRoute('languages.switch') }}" id="local_submit" method="POST"> @csrf <input type="hidden" name="target" value="${$(this).val()}" ></form>`;
            $("body").append(submitForm);
            $("#local_submit").submit();
        });
    });

    //*************** Newsletter Form Submit Start ******************
    $(document).on('submit', '#newslatter-form', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ setRoute('subscriber') }}",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(){
                $('#newslatter-form .button-icon').addClass('d-none');
                $('#newslatter-form .fa-spinner').removeClass('d-none');
            },
            complete: function(){
                $('#newslatter-form .button-icon').removeClass('d-none');
                $('#newslatter-form .fa-spinner').addClass('d-none');
                $('#newslatter-form .newsletter-btn').attr('disabled', false);
            },
            success: function (data) {
                $('#newslatter-form')[0].reset();
                throwMessage('success',data.message.success);
            },
            error: function(xhr, ajaxOption, thrownError){
                var errorObj = JSON.parse(xhr.responseText);
                throwMessage(errorObj.type,errorObj.message.error.errors);
            },
        });
    });

    //*************** Newsletter Form Submit End ******************
    //*************** Contact Form Submit Start ******************
    $(document).on('submit', '#contact-form', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ setRoute('contact.store') }}",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function(){
                $('#contact-form .fa-spinner').removeClass('d-none');
            },
            complete: function(){
                $('#contact-form .fa-spinner').addClass('d-none');
                $('#contact-form .contact-btn').attr('disabled', false);
            },
            success: function (data) {
                $('#contact-form')[0].reset();
                throwMessage('success',data.message.success);
            },
            error: function(xhr, ajaxOption, thrownError){
                var errorObj = JSON.parse(xhr.responseText);
                throwMessage(errorObj.type,errorObj.message.error.errors);
            },
        });
    });
    //*************** Contact Form Submit End ******************
</script>

</body>
</html>
