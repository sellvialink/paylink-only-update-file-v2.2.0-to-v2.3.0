<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? __($page_title) : __("Admin")) }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ get_fav($basic_settings) }}" type="image/x-icon">
    <link href="//fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/fontawesome-all.css') }}">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.css') }}">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/line-awesome.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/animate.css') }}">
    <!-- nice select css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/nice-select.css') }}">
    <!-- select2 css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/select2.css') }}">
    <!-- rte css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/rte_theme_default.css') }}">
    <!-- Popup  -->
    <link rel="stylesheet" href="{{ asset('public/backend/library/popup/magnific-popup.css') }}">
    <!-- Light case   -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/lightcase.css') }}">

    <!-- Fileholder CSS CDN -->
    <link rel="stylesheet" href="https://appdevs.cloud/cdn/fileholder/v1.0/css/fileholder-style.css" type="text/css">

    <!-- main style css link -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}">

    <style>
        .fileholder-single-file-view{
            min-width: 130px;
        }
    </style>
    @stack('css')
</head>
<body>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Admin
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-wrapper">
    <div id="body-overlay" class="body-overlay"></div>
    @include('admin.partials.right-settings')
    @include('admin.partials.side-nav-mini')
    @include('admin.partials.side-nav')
    <div class="main-wrapper">
        <div class="main-body-wrapper">
            <nav class="navbar-wrapper">
                <div class="dashboard-title-part">
                    @yield('page-title')
                    @yield('breadcrumb')
                </div>
            </nav>
            <div class="body-wrapper">
                @yield('content')
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Admin
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!-- jquery -->
<script src="{{ asset('public/backend/js/jquery-3.5.1.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('public/backend/js/bootstrap.bundle.js') }}"></script>
<!-- easypiechart js -->
<script src="{{ asset('public/backend/js/jquery.easypiechart.js') }}"></script>
<!-- apexcharts js -->
<script src="{{ asset('public/backend/js/apexcharts.js') }}"></script>
<!-- chart js -->
<script src="{{ asset('public/backend/js/chart.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('public/backend/js/jquery.nice-select.js') }}"></script>
<!-- select2 js -->
<script src="{{ asset('public/backend/js/select2.js') }}"></script>
<!-- rte js -->
<script src="{{ asset('public/backend/js/rte.js') }}"></script>
<!-- rte plugins js -->
<script src='{{ asset('public/backend/js/all_plugins.js') }}'></script>
<!--  Popup -->
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.js') }}"></script>
<!--  ligntcase -->
<script src="{{ asset('public/backend/js/lightcase.js') }}"></script>
<!--  Rich text Editor JS -->
<script src="{{ asset('public/backend/js/ckeditor.js') }}"></script>
<!-- main -->
<script src="{{ asset('public/backend/js/main.js') }}"></script>

@include('admin.partials.notify')
@include('admin.partials.auth-control')
@include('admin.partials.push-notification')

<script>
    var fileHolderAfterLoad = {};
</script>

<script src="https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js" type="module"></script>

<script type="module">
    import { fileHolderSettings } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-settings.js";
    import { previewFunctions } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js";

    var inputFields = document.querySelector(".file-holder");
    fileHolderAfterLoad.previewReInit = function(inputFields){
        previewFunctions.previewReInit(inputFields)
    };

    fileHolderSettings.urls.uploadUrl = "{{ setRoute('fileholder.upload') }}";
    fileHolderSettings.urls.removeUrl = "{{ setRoute('fileholder.remove') }}";

</script>

<script>
    function fileHolderPreviewReInit(selector) {
        var inputField = document.querySelector(selector);
        fileHolderAfterLoad.previewReInit(inputField);
    }
</script>

<script>
    // lightcase
    $(window).on('load', function () {
      $("a[data-rel^=lightcase]").lightcase();
    })
</script>

<script>
    // fullscreen-bar
    let elem = document.documentElement;
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
      }
    }

    function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }

    $('.header-fullscreen-bar').on('click', function(){
      $(this).toggleClass('active');
      $('.body-overlay').removeClass('active');
    });
</script>

<script>
    // Stroded HTML Markup
var storedHtmlMarkup = {
  add_money_automatic_gateway_credentials_field: `<div class="row align-items-end">
    <div class="col-xl-3 col-lg-3 form-group">
        <label>Title*</label>
        <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="title[]">
    </div>
    <div class="col-xl-3 col-lg-3 form-group">
        <label>Name*</label>
        <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="name[]">
    </div>
    <div class="col-xl-5 col-lg-5 form-group">
        <label>Value</label>
        <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="value[]">
    </div>

    <div class="col-xl-1 col-lg-1 form-group">
        <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
    </div>
  </div>`,
  campaigns_field: `<div class="row align-items-end">
    <div class="col-xl-10 col-lg-10 form-group">
        <label>Amount*</label>
        <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="amount[]">
    </div>

    <div class="col-xl-2 col-lg-2 form-group">
        <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
    </div>
  </div>`,
  payment_gateway_currency_block: `<div class="custom-card mt-15 gateway-currency" style="display:none;">
  <div class="card-header">
      <h6 class="currency-title"></h6>
  </div>
  <div class="card-body">
    <div class="row align-items-center">
        <div class="col-xl-2 col-lg-2 form-group">
            <label>{{__('Gateway Image')}}</label>
            <input type="file" class="file-holder image" name="" accept="image/*">
        </div>
        <div class="col-xl-3 col-lg-3 mb-10">
            <div class="custom-inner-card">
                <div class="card-inner-header">
                    <h5 class="title">Amount Limit*</h5>
                </div>
                <div class="card-inner-body">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>{{ __('Minimum') }}</label>
                                <div class="input-group">
                                    <input type="number" class="form--control min-limit" value="0" name="" step="any">
                                    <span class="input-group-text currency"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>{{ __('Maximum') }}</label>
                                <div class="input-group">
                                    <input type="number" class="form--control max-limit" value="0" name="" step="any">
                                    <span class="input-group-text currency"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 mb-10">
            <div class="custom-inner-card">
                <div class="card-inner-header">
                    <h5 class="title">{{ __('Charge') }}*</h5>
                </div>
                <div class="card-inner-body">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>Fixed*</label>
                                <div class="input-group">
                                    <input type="number" class="form--control fixed-charge" value="0" name="" step="any">
                                    <span class="input-group-text currency"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>{{ __('Percent') }}*</label>
                                <div class="input-group">
                                    <input type="number" class="form--control percent-charge" value="0" name="" step="any">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 mb-10">
            <div class="custom-inner-card">
                <div class="card-inner-header">
                    <h5 class="title">{{ __('Rate') }}*</h5>
                </div>
                <div class="card-inner-body">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>Rate*</label>
                                <div class="input-group">
                                    <span class="input-group-text append ">1 &nbsp; <span class="default-currency"></span> = </span>
                                    <input type="number" class="form--control rate" value="" name="" step="any">
                                    <span class="input-group-text currency"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-6 col-lg-6 form-group">
                            <div class="form-group">
                                <label>{{ __('Symbol') }}</label>
                                <div class="input-group">
                                    <input type="text" class="form--control symbol" value="" name="" placeholder="{{ __('Symbol') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>`,
  payment_gateway_currencies_wrapper: `<div class="payment-gateway-currencies-wrapper"></div>`,
  modal_default_alert: `<div class="card modal-alert border-0">
    <div class="card-body">
        <div class="head mb-3">
            {replace}
        </div>
        <div class="foot d-flex align-items-center justify-content-between">
            <button type="button" class="modal-close btn btn--info">{{ __('Close') }}</button>
            <button type="button" class="alert-submit-btn btn btn--danger btn-loading">{{ __('Remove') }}</button>
        </div>
    </div>
  </div>
  `,
  manual_gateway_input_fields:`<div class="row add-row-wrapper align-items-end">
  <div class="col-xl-3 col-lg-3 form-group">
    <label>{{ __('Field Name') }}*</label>
    <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="label[]" value="" required>
  </div>

  <div class="col-xl-2 col-lg-2 form-group">
      <label>{{ __('Field Types') }}*</label>
      <select class="form--control nice-select field-input-type" name="input_type[]">
          <option value="text" selected>Input Text</option>
          <option value="file">File</option>
          <option value="textarea">Textarea</option>
      </select>
  </div>

  <div class="field_type_input col-lg-4 col-xl-4">

  </div>

  <div class="col-xl-2 col-lg-2 form-group">
    <label for="fieldnecessity">{{ __('Field Necessity') }}*</label>
    <div class="toggle-container">
      <div data-clickable="true" class="switch-toggles default two active">
        <input type="hidden" name="field_necessity[]" value="1">
        <span class="switch " data-value="1">{{ __('Required') }}</span>
        <span class="switch " data-value="0">{{ __('Optional') }}</span>
      </div>
    </div>
  </div>

  <div class="col-xl-1 col-lg-1 form-group">
      <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
  </div>
</div>
  `,
  kyc_input_fields:`<div class="row add-row-wrapper align-items-end">
  <div class="col-xl-3 col-lg-3 form-group">
    <label>{{ __('Field Name') }}*</label>
    <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="label[]" value="" required>
  </div>

  <div class="col-xl-2 col-lg-2 form-group">
      <label>Field Types*</label>
      <select class="form--control nice-select field-input-type" name="input_type[]">
          <option value="text" selected>{{ __('Input Text') }}</option>
          <option value="file">{{ __('File') }}</option>
          <option value="textarea">{{ __('Textarea') }}</option>
          <option value="select">{{ __('Select') }}</option>
      </select>
  </div>

  <div class="field_type_input col-lg-4 col-xl-4">

  </div>

  <div class="col-xl-2 col-lg-2 form-group">
    <label for="fieldnecessity">{{ __('Field Necessity') }}*</label>
    <div class="toggle-container">
      <div data-clickable="true" class="switch-toggles default two active">
        <input type="hidden" name="field_necessity[]" value="1">
        <span class="switch " data-value="1">{{ __('Required') }}</span>
        <span class="switch " data-value="0">{{ __('Optional_web') }}</span>
      </div>
    </div>
  </div>

  <div class="col-xl-1 col-lg-1 form-group">
      <button type="button" class="custom-btn btn--base btn--danger row-cross-btn w-100"><i class="las la-times"></i></button>
  </div>
</div>
  `,
  manual_gateway_input_text_validation_field:`<div class="row">
  <div class="col-xl-6 col-lg-6 form-group">
      <label>{{ __('Min Character') }}*</label>
      <input type="number" class="form--control" placeholder="ex: 6" name="min_char[]" value="0" required>
  </div>
  <div class="col-xl-6 col-lg-6 form-group">
      <label>{{ __('Max Character') }}*</label>
      <input type="number" class="form--control" placeholder="ex: 16" name="max_char[]" value="30" required>
  </div>
</div>`,
  manual_gateway_input_file_validation_field: `<div class="row">
  <div class="col-xl-6 col-lg-6 form-group">
    <label>{{ __('Max File Size (mb)') }}*</label>
    <input type="number" class="form--control" placeholder="ex: 10" name="file_max_size[]" value="10" required>
  </div>
  <div class="col-xl-6 col-lg-6 form-group">
    <label>{{ __('File Extension') }}*</label>
    <input type="text" class="form--control" placeholder="ex: jpg, png, pdf" name="file_extensions[]" value="" required>
  </div>
</div>`,
manual_gateway_select_validation_field: `<div class="row">
<div class="col-xl-12 col-lg-12 form-group">
  <label>{{ __('Options') }}*</label>
  <input type="text" class="form--control" placeholder="{{ __('Type Here') }}..." name="select_options[]" required>
</div>
</div>`,
};

function getHtmlMarkup() {
  return storedHtmlMarkup;
}
// getHtmlMarkup();

function replaceText(htmlMarkup,updateText) {
  return htmlMarkup.replace("{replace}",updateText);
}
</script>

@stack('script')

</body>
</html>
