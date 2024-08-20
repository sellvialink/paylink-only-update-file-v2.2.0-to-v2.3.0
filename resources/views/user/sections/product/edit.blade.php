@extends('user.layouts.master')

@section('content')
<div class="body-wrapper">
    <div class="row mb-20-none">
        <div class="col-xl-12 col-lg-12 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{ __($page_title) }}</h4>
                </div>
                <div class="card-body">
                    <form class="card-form" method="POST" action="{{ setRoute('user.product.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 form-group">
                                <div class="form-group">
                                    @include('admin.components.form.input-file',[
                                       'label'             => __('Image')."*",
                                       'name'              => "image",
                                       'class'             => "file-holder payment-link-image",
                                       'old_files_path'    => files_asset_path("products"),
                                       'old_files'         => $product->image ?? "",
                                   ])
                               </div>
                            </div>
                            <div class="col-xl-8 col-lg-8">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        <label>{{ __('Product Name') }}*</label>
                                        <input type="text" class="form--control" name="product_name" value="{{ old('product_name', $product->product_name) }}" placeholder="{{ __('Enter Product Name') }}..." required>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <label>{{ __('Currency') }}*</label>
                                        <select class="select2-auto-tokenize currency_link w-100" name="currency" required>
                                            <option value="" disabled selected>{{ __('Select One') }}</option>
                                            @foreach ($currency_data as $item)
                                                <option value="{{ $item->id }}" {{ $product->currency == $item->code ? 'selected' : '' }} >{{ $item->code. ' ('. $item->name.')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 form-group">
                                        <label>{{ __('price') }}*</label>
                                        <input type="number" name="price" value="{{ old('price', get_amount($product->price)) }}" class="form--control" placeholder="{{ __('enter Amount') }}..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __('Description') }} <span class="text--base">({{ __('Optional_web') }})</span></label>
                                <textarea class="form--control" name="desc" placeholder="{{ __('Write Here') }}…">{{ old('desc', $product->desc) }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <button type="submit" class="btn--base active w-100 btn-loading">{{ __('submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
