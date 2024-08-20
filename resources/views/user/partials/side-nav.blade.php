@php
    $defualt = get_default_language_code()??'en';
    $default_lng = 'en';
    $footer_slug = Illuminate\Support\Str::slug(App\Constants\SiteSectionConst::FOOTER_SECTION);
    $footer = App\Models\Admin\SiteSections::getData($footer_slug)->first();
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-area">
            <div class="sidebar-logo">
                <a href="{{ setRoute('index') }}" class="sidebar-main-logo">
                    <img src="{{ get_logo($basic_settings) }}" data-white_img="{{ get_logo($basic_settings,'white') }}"
                    data-dark_img="{{ get_logo($basic_settings,'dark') }}" alt="logo">
                </a>
                <button class="sidebar-menu-bar">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div>
            <div class="sidebar-menu-wrapper">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item {{ menuActive('user.dashboard') }}">
                        <a href="{{ setRoute('user.dashboard') }}">
                            <i class="menu-icon las la-palette"></i>
                            <span class="menu-title">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item" {{ menuActive('user.payment-link.index') }}>
                        <a href="{{ route('user.payment-link.index') }}">
                            <i class="menu-icon las la-receipt"></i>
                            <span class="menu-title">{{ __('Payments') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ setRoute('user.invoice.index') }}">
                            <i class="menu-icon las la-file-invoice"></i>
                            <span class="menu-title">{{ __('Invoice') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ setRoute('user.product.index') }}">
                            <i class="menu-icon las la-shopping-bag"></i>
                            <span class="menu-title">{{ __('Products') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ setRoute('user.withdraw.index') }}">
                            <i class="las menu-icon la-money-bill-wave"></i>
                            <span class="menu-title">{{ __('Money Out') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item" {{ menuActive('user.transactions.index') }}>
                        <a href="{{ setRoute('user.transactions.index') }}">
                            <i class="menu-icon las la-random"></i>
                            <span class="menu-title">{{ __('Transactions') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('user.authorize.kyc') }}">
                        <a href="{{ setRoute('user.authorize.kyc') }}">
                            <i class="menu-icon las la-user-lock"></i>
                            <span class="menu-title">{{ __('Identity Verification') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('user.security.google.2fa') }}">
                        <a href="{{ setRoute('user.security.google.2fa') }}">
                            <i class="menu-icon las la-qrcode"></i>
                            <span class="menu-title">{{ __('2FA Security') }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="javascript:void(0)" class="logout-btn">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">{{ __('Logout') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-doc-box">
            <div class="sidebar-doc-icon">
                <i class="las la-headset"></i>
            </div>
            <div class="sidebar-doc-content">
                <h5 class="title">{{ __('Help Center') }}</h5>
                <p>{{ __('How can we help you?') }}</p>
                <div class="sidebar-doc-btn">
                    <a href="{{ route('user.support.ticket.index') }}" class="btn--base w-100">{{ __('Get Support') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
