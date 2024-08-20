<?php
    $defualt_lang = get_default_language_code() ?? 'en';
    $footer_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer = App\Models\Admin\SiteSections::getData($footer_slug)->first();

    $type = Illuminate\Support\Str::slug(App\Constants\GlobalConst::USEFUL_LINKS);
    $useful_links = App\Models\Admin\SetupPage::where('type',$type)->where('status', 1)->get();

    $setup_page_type         = App\Constants\GlobalConst::SETUP_PAGE;
    $menues = DB::table('setup_pages')
            ->where('status', 1)
            ->where('type', Str::slug($setup_page_type))
            ->get();

    $download_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::DOWNLOAD_SECTION);
    $download = App\Models\Admin\SiteSections::getData($download_slug)->first();
?>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<footer class="footer-section">
    <div class="footer-bg">
        <img src="{{ asset('public/frontend/') }}/images/element/footer-bg.png" alt="element">
    </div>
    <div class="footer-top-area">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __("About Us") }}</h4>
                        <p>{{ @$footer->value->language->$defualt_lang->about_details }}</p>
                        <ul class="footer-social">
                            @if(isset($footer->value->items))
                            @foreach($footer->value->items ?? [] as $key => $item)
                                <li><a href="{{ @$item->language->$defualt_lang->link }}" target="_blank"><i class=" {{ @$item->language->$defualt_lang->social_icon }}"></i></a></li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-30">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('Explore') }}</h4>
                        <ul class="footer-list">
                            @foreach ($menues as $item)
                                @php
                                    $title = json_decode($item->title);
                                @endphp
                                <li><a href="{{ url($item->url) }}">{{ __($title->title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-30">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('Useful LInks') }}</h4>
                        <ul class="footer-list">
                            @foreach ($useful_links as $item)
                                <li><a href="{{route('page.view',$item->slug)}}">{{ @$item->title->language->$defualt_lang->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 mb-30">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('Download') }}</h4>
                        <ul class="footer-list">
                            <li><a target="_blank" href="{{ $app_settings->ios_url }}">{{ __('iOS') }}</a></li>
                            <li><a target="_blank" href="{{ $app_settings->android_url }}">{{ __('Android') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-30">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('Newsletter') }}</h4>
                        <p>{{ @$footer->value->language->$defualt_lang->newsltter_details }}</p>

                        <form class="subscribe-form" method="POST" id="newslatter-form">
                            @csrf
                            <div class="form-group">
                                <label class="subscribe-icon"><i class="fa fa-envelope"></i></label>
                                <input type="email" name="email" required class="form--control" placeholder="{{ __('Enter your email_web') }}...">
                                <button type="submit" class="newsletter-btn btn--base subscribe-btn">
                                    <svg class="button-icon" id="fi_2099085" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m507.606 4.394c-3.902-3.902-9.632-5.346-14.917-3.761l-458.881 137.665c-20.222 6.066-33.808 24.326-33.808 45.445 0 20.826 13.985 39.367 34.011 45.089l193.789 55.368 55.368 193.789c5.722 20.025 24.263 34.011 45.097 34.011 21.111 0 39.371-13.586 45.438-33.808l137.664-458.882c1.586-5.285.142-11.014-3.761-14.916zm-477.606 179.342c0-7.761 4.994-14.473 12.428-16.703l401.896-120.569-208.756 208.756-193.316-55.233c-7.213-2.062-12.252-8.741-12.252-16.251zm314.968 285.836c-2.23 7.434-8.942 12.428-16.711 12.428-7.503 0-14.182-5.038-16.243-12.252l-55.233-193.316 208.756-208.756z"></path></svg>

                                    <i class="fa fa-spinner d-none fa-pulse fa-fw"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="copyright-area">
                <p>{!! @$footer->value->language->$defualt_lang->footer_text !!}</p>
            </div>
        </div>
    </div>
</footer>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
