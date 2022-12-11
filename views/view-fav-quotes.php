<?php

require "../vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jeremiah Quiambao');
$pdf->SetTitle('Display Information PDF');
$pdf->SetSubject('PDC10 TCPDF Activity');
$pdf->SetKeywords('TCPDF, PDF, activity');

$pdf->SetHeaderData("", "0", "My Favorite Quotes of All Time", "by Jeremiah Quiambao", array(15,166,163), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set margins
$pdf->SetMargins(20, 30, 20, true);

$pdf->setPrintFooter(true);
$pdf->setPrintHeader(true);

$pdf->AddPage();

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetFont('msungstdlight','',30);
$pdf->Write(10,'"You do not have to be great to start, but you have to start to be great."','',false,'J');
$pdf->Ln(15);
$pdf->Write(10,'- Zig Ziglar','',false,'R');
$pdf->Ln(30);

$pdf->SetFont('pdfatimesbi','',30);
$pdf->Write(10,'"Even if you weren’t chosen, even if you weren’t wanted, even if you aren’t forgiven… You need to stand your ground no matter how pathetic you are!"');
$pdf->Ln(15);
$pdf->Write(10,' - Asta','',false,'R');
$pdf->Ln(30);

$pdf->SetFont('freeserifi','',30);
$pdf->Write(10,'"It’s never too late to be what you might’ve been."');
$pdf->Ln(15);
$pdf->Write(10,' - George Eliot ','',false,'R');
$pdf->Ln(30);



$pdf->Output('view-fav-quotes.pdf', 'I');
