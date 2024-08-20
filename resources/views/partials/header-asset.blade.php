<!-- favicon -->
<link rel="shortcut icon" href="{{ get_fav($basic_settings) }}" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
<!-- fontawesome css link -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/fontawesome-all.css">
<!-- bootstrap css link -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/bootstrap.css">
<!-- favicon -->
<link rel="shortcut icon" href="{{ asset('public/frontend/') }}/images/logo/favicon.png" type="image/x-icon">
<!-- swipper css link -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/swiper.css">
<!-- line-awesome-icon css -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/line-awesome.css">
<!-- odometer css link -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/odometer.css">
<!-- animate.css -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/animate.css">
<!-- Magnific popup css link -->
<link rel="stylesheet" href="{{ asset('public/backend/css/select2.css') }}">

<!-- nice select css -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/nice-select.css">

<link rel="stylesheet" href="{{ asset('public/backend/library/popup/magnific-popup.css') }}">
<!-- Fileholder CSS CDN -->
<link rel="stylesheet" href="https://appdevs.cloud/cdn/fileholder/v1.0/css/fileholder-style.css" type="text/css">

<!-- main style css link -->
<link rel="stylesheet" href="{{ asset('public/frontend/') }}/css/style.css">

@php
    $base_color = @$basic_settings->base_color ?? '#5b39c9';
    $secondary_color = @$basic_settings->secondary_color ?? '#0a2540';
@endphp

<style>
    :root {
        --primary-color: {{$base_color}};
        --secondary-color: {{$secondary_color}};
    }
</style>
