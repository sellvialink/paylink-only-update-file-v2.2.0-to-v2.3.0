<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $basic_settings->site_name ?? 'Paylink' }} - {{ (isset($page_title) ? __($page_title) : __("Dashboard")) }}</title>

    @include('partials.header-asset')

    @stack("css")
</head>
<body class="{{ selectedLangDir() ?? "ltr"}}">

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start body overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="body-overlay" class="body-overlay"></div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End body overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@include('frontend.partials.preloader')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="page-wrapper">
    <!-- sidebar -->
    @include('user.partials.side-nav')

    <div class="main-wrapper">
        <div class="main-body-wrapper">
        <!-- topbar -->
        @include('user.partials.top-nav')

        @yield('content')

        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@include('partials.footer-asset')
@include('admin.partials.notify')

@stack("script")
<script>
    function laravelCsrf() {
        return $("head meta[name=csrf-token]").attr("content");
    }

    var _token = '{!! csrf_token() !!}';

    $(".logout-btn").click(function(){
        var target      = 1;
        var actionRoute =  "{{ setRoute('user.logout') }}";
        var message     = `{{ __('Are you sure to') }} <strong>{{ __('Logout') }}</strong>?`;
        openAlertModal(actionRoute,target,message,"{{ __('Logout') }}","POST");
    });
</script>

</body>
</html>
