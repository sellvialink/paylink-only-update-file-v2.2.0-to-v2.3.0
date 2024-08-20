@php
    $setup_page_type         = App\Constants\GlobalConst::SETUP_PAGE;
    $menues = DB::table('setup_pages')
            ->where('status', 1)
            ->where('type', Str::slug($setup_page_type))
            ->get();

    $current_route = Route::currentRouteName();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<header class="header-section {{ $current_route == 'index' ? '' : 'two' }}">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container custom-container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="{{ setRoute('index') }}">
                            <img src="{{ get_logo($basic_settings,'dark') }}"  data-white_img="{{ get_logo($basic_settings,'dark') }}"
                            data-dark_img="{{ get_logo($basic_settings,'white') }}"
                                alt="site-logo">
                        </a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                @php
                                    $current_url = URL::current();
                                @endphp
                                @foreach ($menues as $item)
                                    @php
                                        $title = json_decode($item->title);
                                    @endphp
                                    <li><a href="{{ url($item->url) }}" class="@if ($current_url == url($item->url)) active @endif">{{ __($title->title) }}</a></li>
                                @endforeach
                            </ul>
                            <div class="header-language">
                                @php
                                    $session_lan = session('local')??get_default_language_code();
                                @endphp
                                <select name="lang_switch" class="form--control language-select nice-select" id="language-select">
                                    @foreach($__languages as $item)
                                        <option value="{{$item->code}}" @if($session_lan == $item->code) selected  @endif>{{ __($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="header-action">
                                @auth
                                    <a href="{{ setRoute('user.dashboard') }}" class="header-btn btn--base active">{{ __('Dashboard') }}</a>
                                @else
                                    <a href="{{ setRoute('user.login') }}" class="header-btn header-custom-btn">{{ __('Log In') }}</a>
                                    @if ($basic_settings->user_registration != 0)
                                        <a href="{{ setRoute('user.register') }}" class="header-btn btn--base active">{{ __('Register') }}</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
