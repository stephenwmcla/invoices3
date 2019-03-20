@extends('layout')

@section('content')
<h3>Edit Invoice</h3>
<fieldset><legend>Edit Invoice</legend>
    @include('displayField', ['fieldName' => $clients->client_name, 'fieldDesc' => 'Client Name'])
    @include('displayField', ['fieldName' => $invoiceHeader->invoice_number, 'fieldDesc' => 'Invoice Number'])
    @include('displayField', ['fieldName' => $invoiceHeader->invoice_date, 'fieldDesc' => 'Invoice Date'])
    @include('displayField', ['fieldName' => $invoiceHeader->invoice_amount, 'fieldDesc' => 'Invoice Amount'])
</fieldset>
<fieldset><legend>Create Invoice Detail</legend>
    {!! Form::open(array('url' => 'InvoiceDetails?id=' . $invoiceHeader->invoice_uid)) !!}
    {!! Form::hidden('invoice_uid', $invoiceHeader->invoice_uid) !!}

<div class="fieldLabel">Line No</div>
    <div class="fieldData"><?php echo Form::text('invoice_line_no', $invoiceLineNumber); ?></div>
    @include('field', ['fieldName' => 'invoice_detail', 'fieldDesc' => 'Invoice Detail'])
    @include('field', ['fieldName' => 'invoice_line_amount', 'fieldDesc' => 'Invoice Amount'])
    <input type="submit" value='Submit' />

    {!! Form::close() !!}
</fieldset>
@endsection
