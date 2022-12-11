<?php

require "../vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jeremiah Quiambao');
$pdf->SetTitle('TCPDF PERSONAL INFO');
$pdf->SetSubject('PDC10 TCPDF ACTIVITY');
$pdf->SetKeywords('TCPDF, PDF, ACTIVITY, INFORMATION');

// set margins
$pdf->SetMargins(10, 5, 10, true);

$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

$pdf->SetFont('dejavusans', '', 19  , '', true);

$pdf->AddPage();

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.5, 'depth_h'=>0.4, 'color'=>array(212, 198, 135), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = '../assets/images/profile.jpg';
$pdf->Image($img_file, 0, 0, 210, 390, '', '', '', false, 400, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$html = <<<EOD
<h1 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-decoration:none; background-color:#a39e58 ;color:black;">&nbsp;<span style="color:white;">Student </span><span style="color:white;">Information</span>&nbsp;</a></h1>
<p><b>Name: </b>Jeremiah C. Quiambao</p>
<p><b>Program: </b>Bachelor of Science in Information Technology</p>
<p><b>Email Address: </b>quiambao.jeremiah@auf.edu.ph</p>
<p><b>Student Number:</b> 20-0268-683</p>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('view-personal-information.pdf', 'I');
