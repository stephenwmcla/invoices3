@extends('layout')

@section('content')
<h3>Edit Invoice</h3>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<fieldset><legend>Edit Invoice</legend>
    {!! Form::model($invoiceHeader, array('route' => array('InvoiceHeaders.update', $invoiceHeader->invoice_uid), 'method' => 'PUT')) !!}
    {!! Form::hidden('invoice_uid') !!}
    {!! Form::token() !!}
    <div class="dataWrapper">
        <div class="fieldLabel">
            <?php echo Form::label('client_id', 'Client Name'); ?></div>
        <div class="fieldData">
            {!! Form::select('client_id', $clients, $invoiceHeader->client_id); !!}
            @if ($errors->has('client_id')) 
            <span class='red'> {{
                 $errors->first('client_id') }} </span>
            @endif
        </div></div>
    @include('field', ['fieldName' => 'invoice_number', 'fieldDesc' => 'Invoice Number'])
    @include('field', ['fieldName' => 'invoice_date', 'fieldDesc' => 'Invoice Date'])
    @include('displayField', ['fieldName' => $invoiceHeader->invoice_amount, 'fieldDesc' => 'Invoice Amount'])
    <input type="submit" value='Update' />

    {!! Form::close() !!}
</fieldset>
@include('InvoiceDetails.index')
@endsection
