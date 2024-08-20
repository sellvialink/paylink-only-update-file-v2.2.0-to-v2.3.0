@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Transactions")])
@endsection

@section('content')
<div class="body-wrapper">
    <div class="table-area">
        <div class="dashboard-header-wrapper">
            <h4 class="title">{{ __($page_title) ?? __('Transaction Log') }}</h4>
            <div class="header-search-wrapper">
                <div class="position-relative">
                    <input class="form--control" type="text" name="search" placeholder="{{ __('Ex: Transaction, Add Money') }}" aria-label="Search">
                    <span class="las la-search"></span>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <div class="item-wrapper">
                @include('user.components.transaction-log', compact('transactions'))
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
<div>

@endsection
@push('script')
    <script>
        var searchURL = '{{ setRoute("user.transactions.search") }}';
        var timeOut;

        $("input[name=search]").bind("keyup", function(){
            clearTimeout(timeOut);
            timeOut = setTimeout(executeLogSearch, 500, $(this));
        })

        function executeLogSearch(input) {
            // Ajax request
            var searchText = input.val();
            if(searchText.length == 0) {
                $(".search-result-item-wrapper").remove();
                $(".item-wrapper").removeClass("d-none");
            }

            if(searchText.length < 1) {
                return false;
            }

            var data = {
                _token      : laravelCsrf(),
                text        : searchText,
            };
            $.post(searchURL,data,function(response) {
                //response
            }).done(function(response){
                $(".search-result-item-wrapper").remove();
                $(".item-wrapper").addClass("d-none");

                $(".table-wrapper").append(`
                    <div class="search-result-item-wrapper">
                        ${response}
                    </div>
                `);

            }).fail(function(response) {
                throwMessage('error',[__("Something Went Wrong! Please Try Again.")]);
            });
        }

    </script>
@endpush
