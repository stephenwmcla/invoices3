@extends('layout')

@section('content')
<h3>Maintain Invoice Status</h3>
<table class='prodTable'>
    <tr>
        <th>Status Id</th>
        <th>Status Description</th>
        <th>Edit</th>
    </tr>
    @foreach($invoiceStatus as $invoiceStatusLine)
    <tr>
        <td>{{ $invoiceStatusLine->status_id }}</td>
        <td>{{ $invoiceStatusLine->status_description }}</td>
        <td><a href='maintainStatus/{{ $invoiceStatusLine->status_id}}'>Edit</td>
    </tr>
    @endforeach
</table>
<button onclick="window.location='/maintainStatus/create'">Add New</button>
@stop

<!-- php artisan serve --port=8080 -->