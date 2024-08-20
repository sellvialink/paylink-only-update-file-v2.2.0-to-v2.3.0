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
                    <a href="{{ setRoute('user.support.ticket.create') }}" class="btn--base active"><i class="las la-plus me-1"></i> {{ __('Add New') }}</a>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="custom-table two">
                    <thead>
                        <tr>
                            <th>{{ __('Ticket ID') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Subject') }}</th>
                            <th>{{ __('Message') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Last Reply') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($support_tickets as $item)
                            <tr>
                                <td>#{{ $item->token }}</td>
                                <td><span class="text--info">{{ $item->email }}</span></td>
                                <td><span class="text--info">{{ $item->subject }}</span></td>
                                <td>{{ Str::words($item->desc, 10, '...') }}</td>
                                <td>
                                    <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                                </td>
                                <td>{{ $item->created_at->format("Y-m-d H:i A") }}</td>
                                <td>
                                    <a href="{{ route('user.support.ticket.conversation',encrypt($item->id)) }}" class="btn btn--base"><i class="las la-comment"></i></a>
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
            {{ $support_tickets->links() }}
        </nav>
    </div>
</div>

</div>
@endsection

@push('script')
    <script>

    </script>
@endpush
