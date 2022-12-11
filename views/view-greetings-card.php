<?php

require "../vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jeremiah Quiambao');
$pdf->SetTitle('Greeting Cards TCPDF');
$pdf->SetSubject('PDC10 TCPDF Activity');
$pdf->SetKeywords('TCPDF, PDF, Activity, Greetings, Card');

// set margins
$pdf->SetMargins(35, 10, 10, true);

$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);

$pdf->SetFont('dejavusans', '', 18, '', true);

$pdf->AddPage('L', 'A4');

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(123,126,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = '../assets/images/holidays.jpg';
$pdf->Image($img_file, 0, 0, 298, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', '' => '5,10', 'color' => array(255,));

$pdf->Rect(25, 20, 250, 170, 'DF', array('all' => $style3), array(242,85,153));


$red = array(255, 0, 0);
$blue = array(0, 0, 200);
$yellow = array(255, 255, 0);
$green = array(0, 255, 0);
$white = array(255);
$black = array(0);
$coords = array(0, 0, 1, 0);

$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $white);
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => $white);


$pdf->CoonsPatchMesh(24, 19, 3, 172, $green, $red, $green, $red);
$pdf->CoonsPatchMesh(24, 19, 252, 3, $green, $red, $green, $red);
$pdf->CoonsPatchMesh(273, 19, 3, 172, $green, $red, $green, $red);
$pdf->CoonsPatchMesh(24, 189, 252, 3, $green, $red, $green, $red);
$pdf->SetFont('times', 'BI', 60, '', false);
$pdf->SetTextColor(255);
$pdf->Cell(230, 70, 'Happy Holidays!', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', 'I', 40, '', false);
$pdf->Ln(0);
$pdf->SetFont('times', 'BI', 40, '', false);
$pdf->Cell(230, 145, 'The magic of the season is here!', 0, 0, 'C', 0, '', 0);
$pdf->SetLineStyle($style5);
$pdf->Ln(0);
$html = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><span style="text-align:justify;"><p>May your holiday have PEACE, LOVE, JOY, & SPRINKLES!</p></span>';
$pdf->SetFont('helvetica', 'I', 20);

$pdf->writeHTML($html, false, 2, true, false);
$pdf->StarPolygon(52, 45, 12, 5, 2, 35, 1, null, array('all' => $style5), null, null, $style6);
$pdf->StarPolygon(247, 45, 12, 5, 2, 35, 1, null, array('all' => $style5), null, null, $style6);
$pdf->StarPolygon(150, 125, 25, 50, 26);
$pdf->StarPolygon(100, 125, 15, 50, 26);
$pdf->StarPolygon(200, 125, 15, 50, 26);


$pdf->Output('view-greetings-card.pdf', 'I');
