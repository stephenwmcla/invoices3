@extends('layout')

@section('content')
<h3>Edit Invoice</h3>
<fieldset><legend>Edit Invoice</legend>
    <div class="dataWrapper">
        <div class="fieldLabel">Client Name</div>
        <div class="fieldData"><?php echo $clients->client_name; ?></div>
    </div>
    <div class="dataWrapper">
        <div class="fieldLabel">Invoice Number</div>
        <div class="fieldData"><?php echo $invoiceHeader->invoice_number; ?></div>
    </div>
    <div class="dataWrapper">
        <div class="fieldLabel">Invoice Date</div>
        <div class="fieldData"><?php echo $invoiceHeader->invoice_date; ?></div>
    </div>
    <div class="dataWrapper">
        <div class="fieldLabel">Invoice Amount</div>
        <div class="fieldData"><?php echo $invoiceHeader->invoice_amount; ?></div>
    </div>
</fieldset>
<fieldset><legend>Edit Invoice Detail</legend>
    {!! Form::model($invoiceDetail, array('route' => array('InvoiceDetails.update', $invoiceDetail->invoice_line_uid), 'method' => 'PUT')) !!}
    {!! Form::hidden('invoice_uid', $invoiceHeader->invoice_uid) !!}
    {!! Form::hidden('invoice_line_uid') !!}
    <div class="dataWrapper">
        <div class="fieldLabel">Line No</div>
        <div class="fieldData"><?php echo $invoiceDetail->invoice_line_number; ?></div>
    </div>
    <div class="dataWrapper">
        <div class="fieldLabel"><?php echo Form::label('invoice_detail', 'Invoice Detail'); ?></div>
        <div class="fieldData"><?php echo Form::text('invoice_detail'); ?></div>
        @if ($errors->has('invoice_detail')) <span class='red'>  {{
            $errors->first('invoice_detail') }} </span>
        @endif
    </div>
    <div class="dataWrapper">
        <div class="fieldLabel"><?php echo Form::label('invoice_line_amount', 'Line Amount'); ?></div>
        <div class="fieldData"><?php echo Form::text('invoice_line_amount'); ?></div>
        @if ($errors->has('invoice_line_amount')) <span class='red'>  {{
            $errors->first('invoice_line_amount') }} </span>
        @endif
    </div>
    <?php echo Form::submit('Update'); ?>

    {!! Form::close() !!}
</fieldset>
@endsection