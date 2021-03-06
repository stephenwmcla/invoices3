@extends('layout')

@section('content')
<h3>Create Status</h3>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <span class='red'>Please fix the following errors</span>
</div>
@endif
<fieldset><legend>Status</legend>
        {!! Form::open(array('url' => 'InvoiceStatuses')) !!}
    @include('field', ['fieldName' => 'status_id', 'fieldDesc' => 'Status ID'])
    @include('field', ['fieldName' => 'status_description', 'fieldDesc' => 'Description'])
    <?php echo Form::submit('Submit'); ?>
    {!! Form::close() !!}
</fieldset>
@endsection
