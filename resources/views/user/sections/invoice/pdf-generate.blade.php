<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paylink - Collecting Payment Platform</title>
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <style>
        html {
            font-size: 100%;
            scroll-behavior: smooth;
        }
        body {
            background: #f5f5f5;
            font-family: "DM Sans", sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5em;
            color: #425466;
            margin: 0;
            overflow-x: hidden;
        }
        *, ::after, ::before {
            box-sizing: border-box;
        }
        ::selection {
            background-color: #5b39c9;
            color: #ffffff;
        }
        h1, h2, h3, h4, h5, h6 {
            clear: both;
            line-height: 1.3em;
            color: #0a2540;
            -webkit-font-smoothing: antialiased;
            font-family: "DM Sans", sans-serif;
            font-weight: 700;
        }
        h3 {
            font-size: 22px;
        }
        h6 {
            font-size: 15px;
        }
        p {
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.7em;
        }
        p:last-child {
            margin-bottom: 0px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }
        span {
            display: inline-block;
        }
        b, strong {
            font-weight: bolder;
        }
        .payment-card {
            min-height: 100vh;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            overflow: hidden;
            justify-content: center;
        }
        .payment-preview-wrapper.invoice-preview-wrapper {
            width: 1000px;
            padding: 30px 50px;
        }
        .payment-invoice-box {
            background-color: #ffffff;
            -webkit-box-shadow: 0px 6px 15px rgba(64, 79, 104, 0.05);
            box-shadow: 0px 6px 15px rgba(64, 79, 104, 0.05);
            border-radius: 5px;
            padding: 40px;
        }
        .payment-invoice-box-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .payment-invoice-box-header .title {
            margin-bottom: 0;
        }
        .payment-invoice-box-header .company-name {
            margin-bottom: 0;
            color: #6e6e6e;
            font-weight: 800;
        }
        .payment-invoice-box-list li {
            font-weight: 500;
            color: #0a2540;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding-bottom: 5px;
        }
        .payment-invoice-box-list li span {
            width: 30%;
        }
        .payment-invoice-box-list-wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-top: 40px;
            margin-bottom: 30px;
            width: 80%;
        }
        .payment-invoice-box-list li {
            font-weight: 500;
            color: #0a2540;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding-bottom: 5px;
        }
        .payment-invoice-table {
            margin-top: 40px;
        }
        .payment-invoice-table .table-wrapper {
            border: none;
        }
        .table-responsive {
            display: block;
            width: 100%;
        }
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .custom-table {
            width: 100%;
            white-space: nowrap;
            border-spacing: 0 10px;
            border-collapse: separate;
        }
        .payment-invoice-table .custom-table {
            border-collapse: collapse;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        .payment-invoice-table .custom-table thead tr {
            border-bottom: 1px solid #0a2540;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .payment-invoice-table .custom-table thead tr th {
            font-size: 14px;
        }
        .custom-table thead tr th {
            border: none;
            font-weight: 600;
            color: #0a2540;
            font-size: 16px;
            padding: 12px 15px;
        }
        .custom-table thead tr th:first-child {
            border-radius: 5px 0 0 5px;
            padding-left: 0;
        }
        th {
            display: table-cell;
            vertical-align: inherit;
            font-weight: bold;
            text-align: -internal-center;
            text-align: -webkit-match-parent;
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        .custom-table tbody tr {
            background-color: #ffffff;
        }
        .custom-table tbody tr td {
            border: none;
            font-weight: 500;
            vertical-align: middle !important;
            font-size: 14px;
            padding: 12px 15px;
        }
        .payment-invoice-table .custom-table tbody tr td:first-child {
            padding-left: 0;
        }
        .custom-table tbody tr td:first-child {
            border-radius: 5px 0 0 5px;
        }
        .payment-invoice-table-list-wrapper {
            width: 46%;
            margin-left: auto;
        }
        .payment-invoice-table-list-wrapper .payment-invoice-table-list li {
            font-weight: 500;
            border-top: 1px solid #e5e5e5;
            padding-top: 10px;
            margin-top: 10px;
            font-size: 14px;
        }
        .payment-invoice-table-list-wrapper .payment-invoice-table-list li span {
            float: right;
        }
        .payment-invoice-footer {
            border-top: 1px solid #e5e5e5;
            padding: 20px 0;
            margin-top: 80px;
        }
        .payment-invoice-footer p {
            font-size: 13px;
            font-weight: 600;
        }
    </style>
</head>
<body>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Pdf
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="payment-wrapper">
    <div class="payment-card">
        <div class="payment-preview-wrapper invoice-preview-wrapper">
            <div class="payment-invoice-box">
                <div class="payment-invoice-box-header">
                    <h3 class="title">Invoice</h3>
                    <h3 class="company-name">{{ @$invoice->title }}</h3>
                </div>
                <ul class="payment-invoice-box-list">
                    <li><span class="left">Invoice number</span> <span class="right"><b>{{ @$invoice->invoice_no }}</b></span></li>
                    <li><span class="left">Date due</span> <span class="right">{{ dateFormat('d M Y , h:i:s A', $invoice->created_at) }}</span></li>
                </ul>
                <div class="payment-invoice-box-list-wrapper">
                    <ul class="payment-invoice-box-list">
                        <li><b>{{ $invoice->title }}</b></li>
                        <li>{{ $invoice->phone }}</li>
                    </ul>
                    <ul class="payment-invoice-box-list">
                        <h6 class="title">Bill to</h6>
                        <li>{{ $invoice->name }}</li>
                        <li>{{ $invoice->email }}</li>
                    </ul>
                </div>
                <div class="payment-invoice-price">
                    <h3 class="price">{{ get_amount($invoice->amount, $invoice->currency) }} due {{ dateFormat('d M Y , h:i:s A', $invoice->created_at) }}</h3>
                </div>
                <div class="payment-invoice-table">
                    <div class="table-wrapper">
                        <div class="table-responsive">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Unit price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->invoiceItems ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ get_amount($item->price, $invoice->currency) }}</td>
                                            <td>{{ get_amount($item->price, $invoice->currency) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="payment-invoice-table-list-wrapper">
                        <ul class="payment-invoice-table-list">
                            <li>Quantity <span>{{ $invoice->qty }}</span></li>
                            <li>Total <span>{{ get_amount($invoice->amount, $invoice->currency) }}</span></li>
                            <li><b>Amount due</b> <span>{{ get_amount($invoice->amount, $invoice->currency) }}</span></li>
                        </ul>
                    </div>
                    <div class="payment-invoice-footer">
                        <p>{{ $invoice->invoice_no }} - {{ get_amount($invoice->amount, $invoice->currency) }} due {{ dateFormat('d M Y , h:i:s A', $invoice->created_at) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Pdf
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


</body>
</html>
