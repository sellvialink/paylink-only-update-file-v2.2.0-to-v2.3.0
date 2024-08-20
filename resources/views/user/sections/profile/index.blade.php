@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')

<div class="body-wrapper">
    <div class="dashboard-area mt-10">
        <div class="row mb-20-none">
            <div class="col-xl-6 col-lg-6 mb-20">
                <div class="custom-card mt-10">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">{{ $page_title }}</h4>
                        <a href="javascript:void(0)" class="btn--base bg--danger delete-btn">{{ __('Delete Profile') }}</a>
                    </div>
                    <div class="card-body profile-body-wrapper">
                        <form class="card-form" action="{{ setRoute('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="profile-settings-wrapper">
                                <div class="preview-thumb profile-wallpaper">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview bg_img" data-background="{{ asset('public/frontend/') }}/images/element/support.png" style="background-image: url(&quot;{{ asset('public/frontend/') }}/images/element/support.png&quot;);"></div>
                                    </div>
                                </div>
                                <div class="profile-thumb-content">
                                    <div class="preview-thumb profile-thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img" data-background="{{ $user->userImage }}" style="background-image: url(&quot;{{ $user->userImage }}&quot;);"></div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="profilePicUpload2">
                                            <label for="profilePicUpload2"><i class="las la-upload"></i></label>
                                        </div>
                                    </div>
                                    <div class="profile-content">
                                        <h6 class="username">{{ $user->firstname. ' ' .$user->lastname }}</h6>
                                        <ul class="user-info-list mt-md-2">
                                            <li><i class="las la-envelope"></i>{{ $user->email }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-form-area">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('first Name') }}<span>*</span></label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter Name') }}..." required name="first_name" value="{{ old('first_name', $user->firstname ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('last Name') }}<span>*</span></label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter Name') }}..." required name="last_name" value="{{ old('last_name', $user->lastname ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('Country') }}</label>
                                        <select class="form--control select2-auto-tokenize" style="display: none;" name="country">
                                            <option value="" selected>{{ Auth::user()->address->country }}</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('Mobile') }}</label>
                                        <input type="number" class="form--control" placeholder="{{ __('Enter Number') }}..." name="mobile" value="{{ old('mobile', $user->mobile ?? '') }}">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        <label>{{ __('Company Name') }}</label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter Company Name') }}..." name="company_name" value="{{ old('company_name', $user->address->company_name ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('Address') }}</label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter Address') }}..." name="address" value="{{ old('address', $user->address->address ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('City') }}</label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter City') }}..." name="city" value="{{ old('city', $user->address->city ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('State') }}</label>
                                        <input type="text" class="form--control" placeholder="{{ __('Enter State') }}..." name="state" value="{{ old('state', $user->address->state ?? '') }}">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                        <label>{{ __('Zip Code') }}</label>
                                        <input type="number" class="form--control" placeholder="{{ __('Enter Zip') }}..." name="zip_code" value="{{ old('zip_code', $user->address->zip_code ?? '') }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <button type="submit" class="btn--base w-100 active btn-loading">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-20">
                <div class="custom-card mt-10">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">{{ __('Change Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="card-form" method="POST" action="{{ setRoute('user.profile.password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 form-group show_hide_password">
                                    <label>{{ __('Current Password') }}<span>*</span></label>
                                    <input type="password" class="form--control" placeholder="{{ __('Enter Password') }}..." name="current_password" required>
                                    <a href="" class="show-pass profile"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group show_hide_password">
                                    <label>{{ __('New Password') }}<span>*</span></label>
                                    <input type="password" class="form--control" placeholder="{{ __('Enter Password') }}..." name="password" required>
                                    <a href="" class="show-pass profile"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group show_hide_password">
                                    <label>{{ __('Confirm Password') }}<span>*</span></label>
                                    <input type="password" class="form--control" placeholder="{{ __('Enter Password') }}..." name="password_confirmation">
                                    <a href="" class="show-pass profile"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit" class="btn--base w-100 active btn-loading">{{ __('Change') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        getAllCountries("{{ setRoute('global.countries') }}",$(".country-select"));
        $(document).ready(function(){
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });
            setTimeout(() => {
                var phoneCodeOnload = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCodeOnload);
            }, 400);
        });

        $(".delete-btn").click(function(){
            var actionRoute =  "{{ setRoute('user.delete.account') }}";
            var target      = 1;
            var btnText = "Delete Account";
            var projectName = "{{ @$basic_settings->site_name }}";
            var name = $(this).data('name');
            var message     = `Are you sure to delete <strong>your account</strong>?<br>If you do not think you will use “<strong>${projectName}</strong>”  again and like your account deleted, we can take card of this for you. Keep in mind you will not be able to reactivate your account or retrieve any of the content or information you have added. If you would still like your account deleted, click “Delete Account”.?`;
            openAlertModal(actionRoute,target,message,btnText,"DELETE");
        });

    </script>
@endpush
