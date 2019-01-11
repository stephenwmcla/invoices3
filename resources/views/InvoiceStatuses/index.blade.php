@extends('layout')

@section('content')
<h3>Maintain Invoice Status</h3>
<table class='prodTable'>
    <tr>
        <th>Status Id</th>
        <th>Status Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($invoiceStatus as $invoiceStatusLine)
    <tr>
        <td>{{ $invoiceStatusLine->status_id }}</td>
        <td>{{ $invoiceStatusLine->status_description }}</td>
        <td><a href='InvoiceStatuses/{{ $invoiceStatusLine->status_id }}/edit'>Edit</td>
        <td><a href='InvoiceStatuses/{{ $invoiceStatusLine->status_id }}/destroy'>Delete</td>
    </tr>
    @endforeach
</table>
<button onclick="window.location='/InvoiceStatuses/create'">Add New</button>
@stop

<!-- php artisan serve --port=8080 -->