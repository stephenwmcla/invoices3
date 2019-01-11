@extends('layout')

@section('content')
<h3>Maintain Client</h3>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<fieldset><legend>Clients</legend>
{!! Form::model($clients, array('url' => 'Clients')) !!}
    @include('field', ['fieldName' => 'client_id', 'fieldDesc' => 'ID'])
    @include('field', ['fieldName' => 'client_name', 'fieldDesc' => 'Client Name'])
    @include('field', ['fieldName' => 'client_contact', 'fieldDesc' => 'Contact'])
    @include('field', ['fieldName' => 'address_1', 'fieldDesc' => 'Address 1'])
    @include('field', ['fieldName' => 'address_2', 'fieldDesc' => 'Address 2'])
    @include('field', ['fieldName' => 'address_3', 'fieldDesc' => 'Address 3'])
    @include('field', ['fieldName' => 'invoice_prefix', 'fieldDesc' => 'Invoice Prefix'])
    @include('field', ['fieldName' => 'next_invoice_no', 'fieldDesc' => 'Next Invoice No'])
<?php echo Form::submit('Submit'); ?>
{!! Form::close() !!}
</fieldset>
@endsection
