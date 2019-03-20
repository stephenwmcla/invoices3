<h3>Invoice Details</h3>
<table class='prodTable'>
    <tr>
        <th>Line No.</th>
        <th>Detail</th>
        <th>Amount</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($invoiceDetail as $invoiceDetailLine)
    <tr><td>{{ $invoiceDetailLine->invoice_line_no }}</td><td>{{ $invoiceDetailLine->invoice_detail }}</td><td>{{ $invoiceDetailLine->invoice_line_amount }}</td>
        <td><a href='/InvoiceDetails/{{ $invoiceDetailLine->invoice_line_uid}}/edit'>Edit</td>
        <td>{!! Form::open(array('url' => '/InvoiceDetails/' . $invoiceDetailLine->invoice_line_uid)) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}</td>
    </tr>
    @endforeach
</table>
<button onclick="window.location='/InvoiceDetails/create?id={{ $invoiceHeader->invoice_uid}}'">Add Line</button>
<!-- php artisan serve --port=8080 -->