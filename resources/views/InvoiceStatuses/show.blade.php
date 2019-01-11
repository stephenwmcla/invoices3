@extends('layout')

@section('content')
<h3>Maintain Client</h3>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<fieldset><legend>Clients</legend>
    {!! Form::open(array('url' => 'InvoiceStatuses.store')) !!}
    @include('field', ['fieldName' => 'status_id', 'fieldDesc' => 'Status ID'])
    @include('field', ['fieldName' => 'status_description', 'fieldDesc' => 'Description'])
    <?php echo Form::submit('Submit'); ?>
    {!! Form::close() !!}
</fieldset>
@endsection
