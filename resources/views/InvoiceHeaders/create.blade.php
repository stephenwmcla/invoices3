@extends('layout')

@section('content')
<h3>Create Invoice</h3>
{!! Form::open(array('url' => 'InvoiceHeaders')) !!}
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<?php
//{{ Form::open(array('action' => 'InvoiceController@create')) }}
//echo Form::model($user, array('route' => array('invoiceHeader.update', $invoiceHeader->invoice_uid)));
echo Form::token();
?>
<fieldset><legend>Create Invoice</legend>
    <div class="dataWrapper">
        <div class="fieldLabel">
            <?php echo Form::label('client_id', 'Client Name'); ?></div>
        <div class="fieldData">
            {!! Form::select('client_id', $clients, -1,['required', 'class' => 'form-control','placeholder'=>'-- Select Client --']); !!}
            @if ($errors->has('client_id')) 
            <span class='red'> {{
                 $errors->first('client_id') }} </span>
            @endif
        </div></div>
    @include('field', ['fieldName' => 'invoice_date', 'fieldDesc' => 'Invoice Date'])
    <input type="submit" value='Submit' />

</fieldset>
{!! Form::close() !!}
@endsection
