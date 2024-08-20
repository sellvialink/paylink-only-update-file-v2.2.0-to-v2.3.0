<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            margin-top: 0;
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
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
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
    </style>
</head>
<body>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Pdf
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;padding-top: 80px;" id="bodyTable">
	<tbody>
		<tr>
			<td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px;background-color:#f5f5f5;padding: 30px;">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#f5f5f5;">
									<tbody>
										<tr>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top: 30px;" align="left" valign="middle" class="emailLogo">
                                                            <h3>Invoice</h3>
                                                        </td>
                                                        <td style="padding-top: 30px;" align="right" valign="middle" class="emailLogo">
                                                            <h3 style="color: #6e6e6e;">{{ @$invoice->title }}</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:10px;padding-bottom:10px;" align="left" valign="top" class="appLinks">
                                                            <span style="padding-right: 20px;color: #0a2540;">{{ __('Invoice number') }}</span>
                                                            <span style="font-weight: 600;color: #0a2540;">{{ @$invoice->invoice_no }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:10px;padding-bottom:10px;" align="left" valign="top" class="appLinks">
                                                            <span style="padding-right: 20px;color: #0a2540;">{{ __('Date due') }}</span>
                                                            <span style="font-weight: 600;color: #0a2540;">{{ dateFormat('d F Y', $invoice->created_at) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:30px;" align="left" valign="top" class="appLinks">
                                                            <h4>{{ @$invoice->title }}</h4>
                                                            <p style="color: #0a2540;">{{ @$invoice->phone }}</p>
                                                        </td>
                                                        <td style="padding-top: 30px;" align="right" valign="top" class="subTitle">
                                                            <h4>Bill to</h4>
                                                            <p style="color: #0a2540;">{{ @$invoice->name }}</p>
                                                            <p style="color: #0a2540;">{{ @$invoice->email }}</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tr>
                                        <tr>
											<td style="padding-top:30px;padding-bottom:10px;" align="left" valign="top" class="appLinks">
												<h3 class="price">{{ @$invoice->currency_symbol }} {{ get_amount(@$invoice->amount) }} due {{ dateFormat('d F Y', $invoice->created_at) }}</h3>
											</td>
										</tr>
                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom: 20px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard">
                                                    <thead>
                                                        <tr>
                                                            <th style="padding-bottom: 15px;border-bottom: 1px solid #000;color: #0a2540;">{{ __('Description') }}</th>
                                                            <th style="padding-bottom: 15px;border-bottom: 1px solid #000;color: #0a2540;">{{ __('Qty') }}</th>
                                                            <th style="padding-bottom: 15px;border-bottom: 1px solid #000;color: #0a2540;">{{ __('Unit price') }}</th>
                                                            <th style="padding-bottom: 15px;border-bottom: 1px solid #000;color: #0a2540;">{{ __('Amount') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (@$invoice->invoiceItems ?? [] as $item)
                                                            <tr>
                                                                <td style="padding-top: 15px">{{ @$item->title }}</td>
                                                                <td style="padding-top: 15px">{{ @$item->qty }}</td>
                                                                <td style="padding-top: 15px">{{ @$invoice->currency_symbol }}{{ @$item->price }}</td>
                                                                <td style="padding-top: 15px">{{ @$invoice->currency_symbol }}{{ @$item->price }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom: 50px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="50%" class="tableCard" style="margin-left: auto;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span>Subtotal</span>
                                                            </td>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span>{{ @$invoice->currency_symbol }} {{ get_amount(@$invoice->amount) }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span>Total</span>
                                                            </td>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span>{{ @$invoice->currency_symbol }} {{ get_amount(@$invoice->amount) }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span style="font-weight: 600;">Amount due</span>
                                                            </td>
                                                            <td style="padding-top:10px;padding-bottom:10px;border-top: 1px solid #e5e5e5;font-size: 14px;" align="left" valign="top" class="appLinks">
                                                                <span style="font-weight: 600;">{{ @$invoice->currency_symbol }} {{ get_amount(@$invoice->amount) }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="padding-top:10px;padding-bottom:10px;font-size: 14px;width:100%" align="center" valign="top" class="appLinks">
                                                                <a href="{{ route('invoice.share', $invoice->token) }}" target="_blank" style="display:block;padding:12px 30px;background-color:#5b39c9;color:#fff;border-radius:5px;font-size:14px;font-weight:600;width:100%;text-align:center;text-decoration:none">Payment Now</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
										<tr>
											<td style="background-color:#e5e5e5;font-size:1px;line-height:1px" class="topBorder" height="1">&nbsp;</td>
										</tr>
                                        <tr>
											<td style="padding-top:15px;padding-bottom:10px;" align="left" valign="top" class="appLinks">
												<p style="font-weight: 600;font-size: 14px;">{{ @$invoice->invoice_no }} - {{ @$invoice->currency_symbol }} {{ get_amount(@$invoice->amount) }} due {{ dateFormat('d F Y', $invoice->created_at) }}</p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Pdf
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


</body>
</html>
