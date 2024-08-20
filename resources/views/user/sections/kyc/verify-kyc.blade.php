@extends('user.layouts.master')

@section('content')
<div class="body-wrapper">
    <div class="row mb-30-none justify-content-center">
        <div class="col-lg-6 mb-30">
            <div class="custom-card mt-10">
                <div class="card-body">
                    <div class="dash-payment-body">
                        @include('user.components.profile.kyc', compact('user_kyc'))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
