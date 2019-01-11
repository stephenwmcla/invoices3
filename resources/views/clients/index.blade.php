@extends('layout')

@section('content')
<h3>Maintain Clients</h3>
<table class='prodTable'>
    <tr>
        <th>Name</th>
        <th>Address 1</th>
        <th>Address 2</th>
        <th>Address 3</th>
        <th>County</th>
        <th>Postcode</th>
        <th>Contact</th>
        <th>Invoice Prefix</th>
        <th>Next Invoice No</th>
        <th>Edit</th>
    </tr>
    @foreach($clients as $client)
    <tr>
        <td>{{ $client->client_name }}</td>
        <td>{{ $client->address_1 }}</td>
        <td>{{ $client->address_2 }}</td>
        <td>{{ $client->address_3 }}</td>
        <td>{{ $client->county }}</td>
        <td>{{ $client->postcode }}</td>
        <td>{{ $client->client_contact }}</td>
        <td>{{ $client->invoice_prefix }}</td>
        <td>{{ $client->next_invoice_no }}</td>
        <td><a href='/Clients/{{ $client->client_id}}/edit'>Edit</td>
    </tr>
    @endforeach
</table>
@stop

<!-- php artisan serve --port=8080 -->