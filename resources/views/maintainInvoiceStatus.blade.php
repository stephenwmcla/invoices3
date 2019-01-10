@extends('layout')

@section('content')
<h3>Maintain Client</h3>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<fieldset><legend>Clients</legend>
    <?php if (isset($invoiceStatus)) { ?>
        {!! Form::model($invoiceStatus, array('url' => 'maintainInvoiceStatus/store')) !!}
    <?php } else { ?>
        {!! Form::open(array('url' => 'maintainInvoiceStatus/store')) !!}
    <?php } ?>
    @include('field', ['fieldName' => 'status_id', 'fieldDesc' => 'Status ID'])
    @include('field', ['fieldName' => 'status_description', 'fieldDesc' => 'Description'])
    <?php echo Form::submit('Submit'); ?>
    {!! Form::close() !!}
</fieldset>
@endsection
