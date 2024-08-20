@extends('user.layouts.master')

@push('css')

@endpush

@section('content')
<div class="body-wrapper">
    <div class="table-area">
        <div class="dashboard-header-wrapper">
            <h4 class="title">{{ __($page_title) }}</h4>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <a href="{{ setRoute('user.product.create') }}" class="btn--base active"><i class="las la-plus me-1"></i> {{ __('Create Product') }}</a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Product Image') }}</th>
                            <th>{{ __('Product Name') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($product->image, 'products') }}" alt="{{ $product->product_name }}"></li>
                                    </ul>
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->desc ? Str::limit($product->desc, 40, '...') : 'N/A'  }}</td>
                                <td>{{ get_amount($product->price, $product->currency) }}</td>
                                <td>
                                    @include('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'value'         => $product->status,
                                        'options'       => [__('Active') => 1,__('Inactive') => 2],
                                        'onload'        => true,
                                        'data_target'   => $product->id,
                                    ])
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ setRoute('user.product-link.index', $product->id) }}" title="Product Links" class="btn--base btn"><i class="las la-link"></i></a>
                                        <div class="action-btn ms-1" title="Action">
                                            <button type="button" class="btn--base btn"><i class="las la-ellipsis-v"></i></button>
                                            <ul class="action-list">
                                                <li><a href="{{ route('user.product.edit', $product->id) }}">{{ __('Edit') }}</a></li>
                                                <li><button class="delete_btn" data-target="{{ $product->id }}" type="button">{{ __('Delete') }}</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 7])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <nav>
            {{ $products->links() }}
        </nav>
    </div>
</div>
@endsection

@push('script')
<script>
     $(document).ready(function(){
        // Switcher
        switcherAjax("{{ setRoute('user.product.status.update') }}");
    })

    $(".delete_btn").click(function(e){
        e.preventDefault();
        var target  = $(this).data('target');
        var actionRoute = "{{ route('user.product.delete') }}";
        var message = `{{ __('Are you sure to') }} <strong>{{ __('Delete') }}</strong>?`;
        var type = $(this).data('type');
        openAlertModal(actionRoute,target,message,type,"DELETE");
    });
</script>
@endpush

