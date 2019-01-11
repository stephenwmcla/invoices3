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
        <td><a href='/InvoiceStatuses/{{ $invoiceStatusLine->status_id }}/edit'>Edit</td>
        <td>
        {!! Form::open(array('url' => '/InvoiceStatuses/' . $invoiceStatusLine->status_id)) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}</td>
    </tr>
    @endforeach
</table>
<button onclick="window.location='/InvoiceStatuses/create'">Add New</button>
@stop

<!-- php artisan serve --port=8080 -->