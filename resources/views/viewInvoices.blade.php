@extends('layout')

@section('content')
<h3>View Invoices</h3>
<table class='prodTable'>
    <tr>
        <th>Client Name</th>
        <th>Contact</th>
        <th>Invoice Number</th>
        <th>Amount</th>
    </tr>
@foreach($invoiceHeader as $invoice)
<tr><td>{{ $invoice->client_id }}</td><td>{{ $invoice->client_id }}</td><td>{{ $invoice->invoice_number }}</td><td>{{ $invoice->invoice_amount }}</td></tr>
    @endforeach
</table>
@stop

<!-- php artisan serve --port=8080 -->