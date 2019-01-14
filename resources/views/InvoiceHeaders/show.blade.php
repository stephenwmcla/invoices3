@section('content')
<?php

use App\Client;
use App\InvoiceDetail;

require('c:/php/fpdf/fpdf.php');

class myPDF extends FPDF {

    function Header() {
        $this->setFont('Times', '', 24);
        $this->Cell(0, 6, "M C A L E E R   C O M P U T I N G", "", 1, "C");
    }

}
$clients = Client::find($invoiceHeader->client_id);

$invoiceDetails = InvoiceDetail::where('invoice_uid', $invoiceHeader->invoice_uid)->orderBy('invoice_line_no')->get();

$pdf = new myPDF();

$pdf->addPage();

$myAddress = "McAleer Computing \nDinsmore \n46 New Road\nNewtown, Powys\nSY16 1AX\nTel 01686 951676 / 07487 667996\nEmail: admin@mcaleercomputing.co.uk";
$pdf->setFont('Arial', '', 8);
$pdf->setXY(10, 30);
$pdf->SetFillColor(220, 220, 220);
$pdf->SetLineWidth(0);
$pdf->MultiCell(80, 4, $myAddress, 0, 'L', true);

$pdf->setXY(10, 65);
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(80, 5, 'Invoice To:');
$pdf->setFont('Arial', '', 8);

$clientAddress = $clients->client_name . "\n";
$clientAddress .= $clients->client_contact . "\n";
$clientAddress .= $clients->address_1 . "\n";
$clientAddress .= $clients->address_2 . "\n";
$clientAddress .= $clients->address_3 . "\n";
$clientAddress .= $clients->county . "\n";
$clientAddress .= $clients->postcode . "\n";
$pdf->setXY(10, 70);
$pdf->SetFillColor(220, 220, 220);
$pdf->SetLineWidth(0);
$pdf->MultiCell(80, 4, $clientAddress, 0, 'L', true);

$pdf->setXY(100, 30);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(30, 5, 'Invoice Number:');
$pdf->setXY(130, 30);
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, $invoiceHeader->invoice_number);

$pdf->setXY(100, 36);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(30, 5, 'Invoice Date:');
$pdf->setXY(130, 36);
$pdf->setFont('Arial', '', 10);
$pdf->Cell(50, 5, $invoiceHeader->invoice_date);

$pdf->setXY(10, 110);

$pound = chr(163);

$headerFlag = false;
$totPxWidth = 0;
$pdf->SetFillColor(220, 220, 150);
$pdf->SetFont('Arial', '', 7);
$pdf->SetLineWidth(.3);
$pdf->Cell(9, 5, 'Line No.', '', 0, 'C', true);
$pdf->Cell(135, 5, 'Detail', '', 0, 'C', true);
$pdf->Cell(30, 5, 'Amount', '', 0, 'R', true);
$pdf->Ln();
foreach ($invoiceDetails as $invoiceDetailLines) {
    $pdf->SetFillColor(230, 230, 230);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(9, 5, $invoiceDetailLines->invoice_line_no, '', 0, 'L', true);
    $pdf->Cell(135, 5, $invoiceDetailLines->invoice_detail, '', 0, 'L', true);
    $pdf->Cell(30, 5, chr(163) . $invoiceDetailLines->invoice_line_amount, '', 0, 'R', true);
    //                       $pdf->Cell($pxWidth, 5, chr(163) . currency_nosymbol($rows->$rowName), '', 0, $fields->justify, true);
    $pdf->Ln();
}


$pdf->Ln();
$pdf->SetFillColor(230, 230, 230);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(144, 5, 'Grand Total', '', 0, '', true);
$pdf->Cell(30, 5, $pound . $invoiceHeader->invoice_amount, '', 0, 'R', true);
$pdf->Ln();

//$pdf->Output("c:\\inetpub\\wwwroot\\invoices\\invoices\\" . $invoiceHeader->invoiceNumber->fieldValue . ".pdf", "I");
$pdf->Output($invoiceHeader->invoice_number . ".pdf", "I");
die();
?>
@endsection