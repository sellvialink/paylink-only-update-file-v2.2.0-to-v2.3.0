@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection
@section('content')
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row">
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Collecting Payment With Link') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ get_amount($transaction_payment_link_balance, get_default_currency_code()) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_transaction_payment_link) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_transaction_payment_link) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart6" data-percent="{{ $transaction_payment_link_percent }}"><span>{{ round($transaction_payment_link_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Collecting Payment With Invoice') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ get_amount($transaction_invoice_balance, get_default_currency_code()) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_transaction_invoice) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_transaction_invoice) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart7" data-percent="{{ $transaction_invoice_percent }}"><span>{{ round($transaction_invoice_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Collecting Payment With Product') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ get_amount($transaction_product_balance, get_default_currency_code()) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_transaction_product) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_transaction_product) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart15" data-percent="{{ $transaction_product_percent }}"><span>{{ round($transaction_product_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Money Out') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ get_amount($money_out_balance, get_default_currency_code()) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_money_out) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_money_out) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart8" data-percent="{{ $money_out_percent }}"><span>{{ round($money_out_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Profit') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ get_amount($profit_balance, get_default_currency_code()) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_profit) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_profit) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart13" data-percent="{{ $profit_percent }}"><span>{{ round($profit_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Payment Link') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ $total_payment_link }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }} {{ $active_payment_link }}</span>
                                    <span class="badge badge--warning">{{ __('Closed') }} {{ $closed_payment_link }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart9" data-percent="{{ $payment_link_percent }}"><span>{{ round($payment_link_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Product Link') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ $total_product_link }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }} {{ $active_product_link }}</span>
                                    <span class="badge badge--warning">{{ __('Inactive') }} {{ $inactive_product_link }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart16" data-percent="{{ $product_link_percent }}"><span>{{ round($product_link_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Invoice') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ $total_invoice }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Paid') }} {{ $paid_invoice }}</span>
                                    <span class="badge badge--warning">{{ __('Unpaid') }} {{ $unpaid_invoice }}</span>
                                    <span class="badge badge--danger">{{ __('Draft') }} {{ $draft_invoice }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart14" data-percent="{{ $invoice_percent }}"><span>{{ round($invoice_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Total Users') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($total_user) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('Active') }} {{ $active_user }}</span>
                                    <span class="badge badge--warning">{{ __('Unverified') }} {{ $unverified_user }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart11" data-percent="{{ $user_percent }}"><span>{{ round($user_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">{{ __('Subscriber') }}</h6>
                                <div class="user-info">
                                    <h2 class="user-count">{{ formatNumberInKNotation($total_subscriber) }}</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">{{ __('This Month') }} {{ formatNumberInKNotation($today_subscriber) }}</span>
                                    <span class="badge badge--warning">{{ __('Last Month') }} {{ formatNumberInKNotation($last_month_subscriber) }}</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart12" data-percent="{{ $subscriber_percent }}"><span>{{ round($subscriber_percent) }}%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-15">
        <div class="row mb-15-none">
            <div class="col-xxl-12 col-xl-12 col-lg-12 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">{{ __('Payment Link, Invoice, Product Link And Money Out Analytics') }}</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart3"  data-chart_three_data="{{ json_encode($chart_three_data) }}" class="order-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-6 col-xxl-3 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">{{ __('User Analytics') }}</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart4" data-chart_four_data="{{ json_encode($chart_four_data) }}" class="balance-chart"></div>
                    </div>
                    <div class="chart-area-footer">
                        <div class="chart-btn">
                            <a href="{{ setRoute('admin.users.index') }}" class="btn--base w-100">{{ __('View User') }}</a>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-xxxl-6 col-xxl-6 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">{{ __('Profit Growth') }}</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart5" data-chart_five_data="{{ json_encode($chart_five) }}" class="growth-chart"></div>
                    </div>
                    <div class="chart-area-footer">
                        <div class="chart-btn">
                            <a href="{{ setRoute('admin.invoice.index') }}" class="btn--base w-100">{{ __('View Invoice') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __('Latest Transactions') }}</h5>
               <div>
                    <a href="{{ setRoute('admin.payment.link.index') }}" class="btn--base--sm modal-btn"> {{ __('View Payment Link') }}</a>
                    <a href="{{ setRoute('admin.invoice.index') }}" class="btn--base--sm modal-btn"> {{ __('View Invoice') }}</a>
                    <a href="{{ setRoute('admin.product.link.index') }}" class="btn--base--sm modal-btn"> {{ __('View Product Link') }}</a>
                    <a href="{{ setRoute('admin.money.out.index') }}" class="btn--base--sm modal-btn"> {{ __('View Money Out') }}</a>
               </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>{{ __("TRX") }}</th>
                            <th>{{ __("Email") }}</th>
                            <th>{{ __("Amount") }}</th>
                            <th>{{ __("Payable") }}</th>
                            <th>{{ __("Conversion Payable") }}</th>
                            <th>{{ __("Type") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Time") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions  as $key => $item)
                            <tr>
                                <td>{{ $item->trx_id }}</td>
                                <td>{{ $item->user->email ?? 'N/A' }}</td>
                                <td>{{ get_amount(@$item->request_amount, @$item->details->charge_calculation->sender_cur_code) }}</td>
                                <td>{{ get_amount(@$item->payable, @$item->details->charge_calculation->sender_cur_code) }}</td>
                                @if ($item->type == payment_gateway_const()::TYPEMONEYOUT)
                                <td>N/A</td>
                                @else
                                    <td>{{ get_amount(@$item->conversion_payable, @$item->details->charge_calculation->receiver_currency_code) }}</td>
                                @endif
                                <td><span class="text--info">{{ $item->type }}</span></td>
                                <td>
                                    <span class="{{ $item->stringStatus->class }}">{{ $item->stringStatus->value }}</span>
                                </td>
                                <td>{{ dateFormat('d M y h:i:s A', $item->created_at) }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <button type="button" class="btn btn--base bg--success"><i
                                                class="las la-check-circle"></i></button>
                                        <button type="button" class="btn btn--base bg--danger"><i
                                                class="las la-times-circle"></i></button>
                                        <a href="add-logs-edit.html" class="btn btn--base"><i class="las la-expand"></i></a>
                                    @endif
                                </td>
                                @php
                                    if ($item->type == payment_gateway_const()::TYPEPAYLINK) {
                                        $details_route = setRoute('admin.payment.link.details', $item->id);
                                        $permission = 'admin.payment.link.details';
                                    }else if($item->type == payment_gateway_const()::TYPEINVOICE){
                                        $details_route = setRoute('admin.invoice.details', $item->id);
                                        $permission = 'admin.invoice.details';
                                    }else if($item->type == payment_gateway_const()::TYPEPRODUCT){
                                        $details_route = setRoute('admin.product.link.details', $item->id);
                                        $permission = 'admin.invoice.details';
                                    }else if($item->type == payment_gateway_const()::TYPEMONEYOUT){
                                        $details_route = setRoute('admin.money.out.details', $item->id);
                                        $permission = 'admin.payment.link.details';
                                    }
                                @endphp
                                <td>
                                    @include('admin.components.link.info-default',[
                                        'href'          => $details_route,
                                        'permission'    => $permission,
                                    ])
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty',['colspan' => 8])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // pie-chart
        $(function() {
            $('#chart6').easyPieChart({
                size: 80,
                barColor: '#f05050',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#f050505a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart7').easyPieChart({
                size: 80,
                barColor: '#10c469',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#10c4695a',
                lineCap: 'circle',
                animate: 3000
            });
        });

        $(function() {
            $('#chart8').easyPieChart({
                size: 80,
                barColor: '#ffbd4a',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#ffbd4a5a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart9').easyPieChart({
                size: 80,
                barColor: '#ff8acc',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#ff8acc5a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart10').easyPieChart({
                size: 80,
                barColor: '#7367f0',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#7367f05a',
                lineCap: 'circle',
                animate: 3000
            });
        });

        $(function() {
            $('#chart11').easyPieChart({
                size: 80,
                barColor: '#1e9ff2',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#1e9ff25a',
                lineCap: 'circle',
                animate: 3000
            });
        });

        $(function() {
            $('#chart12').easyPieChart({
                size: 80,
                barColor: '#5a5278',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#5a52785a',
                lineCap: 'circle',
                animate: 3000
            });
        });

        $(function() {
            $('#chart13').easyPieChart({
                size: 80,
                barColor: '#ADDDD0',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#ADDDD05a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart14').easyPieChart({
                size: 80,
                barColor: '#ADDDD0',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#ADDDD05a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart15').easyPieChart({
                size: 80,
                barColor: '#5a5278',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#5a52785a',
                lineCap: 'circle',
                animate: 3000
            });
        });
        $(function() {
            $('#chart16').easyPieChart({
                size: 80,
                barColor: '#10c469',
                scaleColor: false,
                lineWidth: 5,
                trackColor: '#10c4695a',
                lineCap: 'circle',
                animate: 3000
            });
        });


        var chart3 = $('#chart3');
        var chart_three_data = chart3.data('chart_three_data');

        var options = {
          series: [
            {
                name: '{{ __("Payment Link") }}',
                color: "#5A5278",
                data: chart_three_data.chart_payment_link_balance
            },
            {
                name: '{{ __("Invoice") }}',
                color: "#8075AA",
                data: chart_three_data.chart_invoice_balance
            },
            {
                name: '{{ __("Product Link") }}',
                color: "#5555AA",
                data: chart_three_data.chart_product_link_balance
            },
            {
                name: '{{ __("Money Out") }}',
                color: "#6F6593",
                data: chart_three_data.chart_payment_link_balance
            }
        ],
          chart: {
          type: 'bar',
          toolbar: {
            show: false
          },
          height: 325
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 5,
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
            type: 'datetime',
            categories: chart_three_data.month_day,
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        }
        };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();


    var chart4 = $('#chart4');
    var chart_four_data = chart4.data('chart_four_data');

    var options = {
    series: chart_four_data,
    chart: {
    width: 350,
    type: 'pie'
    },
    colors: ['#5A5278', '#6F6593', '#8075AA', '#A192D9'],
    labels: ['{{ __("Active") }}', '{{ __("Unverified") }}', '{{ __("Banned") }}', '{{ __("All") }}'],
    responsive: [{
    breakpoint: 1480,
    options: {
        chart: {
        width: 280
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 1199,
    options: {
        chart: {
        width: 380
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 575,
    options: {
        chart: {
        width: 280
        },
        legend: {
        position: 'bottom'
        }
    }
    }],
    legend: {
    position: 'bottom'
    },
    };

    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();

    var chart5 = $('#chart5');
        var chart_five_data = chart5.data('chart_five_data');

        var options = {
        series: chart_five_data,
        chart: {
        width: 350,
        type: 'donut',
        },
        colors: ['#5A5278', '#6F6593', '#8075AA', '#A192D9'],
        labels: ['{{ __("Today") }}', '{{ __("1 Week") }}', '1 Month', '{{ __("1 Year") }}'],
        legend: {
            position: 'bottom'
        },
        responsive: [{
        breakpoint: 1600,
        options: {
            chart: {
            width: 100,
            },
            legend: {
            position: 'bottom'
            }
        },
        breakpoint: 1199,
        options: {
            chart: {
            width: 380
            },
            legend: {
            position: 'bottom'
            }
        },
        breakpoint: 575,
        options: {
            chart: {
            width: 280
            },
            legend: {
            position: 'bottom'
            }
        }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart5"), options);
        chart.render();

    </script>
@endpush
