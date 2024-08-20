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
                    <a href="{{ setRoute('user.product-link.create', $product_id) }}" class="btn--base active"><i class="las la-plus me-1"></i> {{ __('Create Link') }}</a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __('Product Price') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th style="width: 15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product_links ?? [] as $item)
                            <tr>
                                <td>{{ get_amount($item->price, $item->currency) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    @include('admin.components.form.switcher',[
                                        'name'          => 'status',
                                        'value'         => $item->status,
                                        'options'       => [__('Active') => 1,__('Inactive') => 2],
                                        'onload'        => true,
                                        'data_target'   => $item->id,
                                    ])
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" onclick="copyToClipBoard('copy-share-link-{{ $item->id }}')" title="Product Link Share" class="btn--base btn"><i class="las la-clipboard"></i></button>
                                        <input type="hidden" id="copy-share-link-{{ $item->id }}" value="{{ setRoute('product-link.share', $item->token) }}">
                                        <div class="action-btn ms-1" title="Action">
                                            <button type="button" class="btn--base btn"><i class="las la-ellipsis-v"></i></button>
                                            <ul class="action-list">
                                                <li><a href="{{ route('user.product-link.edit', $item->id) }}">{{ __('Edit') }}</a></li>
                                                <li><button class="delete_btn" data-target="{{ $item->id }}" type="button">{{ __('Delete') }}</button></li>
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
            {{ $product_links->links() }}
        </nav>
    </div>
</div>
@endsection

@push('script')
<script>
     $(document).ready(function(){
        // Switcher
        switcherAjax("{{ setRoute('user.product-link.status.update') }}");
    })

    function copyToClipBoard(element) {
        var copyText = document.getElementById(element);
        copyText.select();
        navigator.clipboard.writeText(copyText.value);
        notification('success', 'URL Copied To Clipboard!');
    }

    $(".delete_btn").click(function(e){
        e.preventDefault();
        var target  = $(this).data('target');
        var actionRoute = "{{ route('user.product-link.delete') }}";
        var message = `{{ __('Are you sure to') }} <strong>{{ __('Delete') }}</strong>?`;
        var type = $(this).data('type');
        openAlertModal(actionRoute,target,message,type,"DELETE");
    });
</script>
@endpush

