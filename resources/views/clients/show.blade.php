@extends('layout')

@section('content')
<h3>Show Client</h3>
<fieldset><legend>Clients</legend>
    @include('displayField', ['fieldName' => '$client->client_id', 'fieldDesc' => 'ID'])
    @include('displayField', ['fieldName' => 'client_name', 'fieldDesc' => 'Client Name'])
    @include('displayField', ['fieldName' => 'client_contact', 'fieldDesc' => 'Contact'])
    @include('displayField', ['fieldName' => 'address_1', 'fieldDesc' => 'Address 1'])
    @include('displayField', ['fieldName' => 'address_2', 'fieldDesc' => 'Address 2'])
    @include('displayField', ['fieldName' => 'address_3', 'fieldDesc' => 'Address 3'])
    @include('displayField', ['fieldName' => 'invoice_prefix', 'fieldDesc' => 'Invoice Prefix'])
    @include('displayField', ['fieldName' => 'next_invoice_no', 'fieldDesc' => 'Next Invoice No'])
</fieldset>
@endsection
