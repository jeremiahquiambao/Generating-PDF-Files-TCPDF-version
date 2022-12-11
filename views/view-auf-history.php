<?php

require "../vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jeremiah Quiambao');
$pdf->SetTitle('AUF History');
$pdf->SetSubject('PDC10 TCPDF Activity');
$pdf->SetKeywords('PDC10, TCPDF, PDF, Activity');

// set default header data
$pdf->SetHeaderData("10", "58", "AUF History using TCPDF", "by Jeremiah Quiambao", array(0,102,204), array(96,96,96));
$pdf->setFooterData(array(0,102,204), array(0,64,128));

// set margins
$pdf->SetMargins(10, 90, 10, true);

$pdf->setPrintFooter(true);
$pdf->setPrintHeader(true);

$pdf->SetFont('dejavusans', '', 12, '', true);

$pdf->AddPage();

$pdf->setJPEGQuality(150);

$pdf->Image('../assets/images/auf-logo.jpg', 78, 15, 45, 70, 'JPG', 'http://auf.edu.ph', '', true, 130, '', false, false, 0, false, false, false);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$html = <<<EOD
<h1 style="text-align:center;font-size:40px"><a href="#" style="text-decoration: underline overline dotted;"><span style="color:black;">AUF </span><span style="color:black ;">History</span></a></h1>
<p style="text-align:justify;text-indent:50px">The Angeles University Foundation (Filipino: Pundasyong Pamantasan ng Angeles) also referred to by its acronym AUF, is a private Roman Catholic non-stock, a non-profit educational institution run by lay persons in Angeles City. It was established on May 25, 1962, by Agustin P. Angeles, Barbara Yap-Angeles, and their family.</p>
<br>
<p style="text-align:justify;text-indent:50px">On December 4, 1975, the University was converted to a non-stock, non-profit educational foundation -- the Angeles couple and their children executed a Deed of Donation relinquishing their ownership. AUF was incorporated under Republic Act No. 6055, otherwise known as the Foundation Law, and became a tax-exempt institution approved by the Philippine government. All donations and bequests given to the AUF are tax deductible.</p>
<br>
<p style="text-align:justify;text-indent:50px">On February 14, 1978, AUF was converted to a Catholic University. As the first Catholic university in Central Luzon, AUF ensures not only professional success but total development which is anchored on Christian education that is holistic, integrated and formative. On February 20, 1990, the five-storey, 125-bed AUF Medical Center was inaugurated which now serves as a private teaching, training and research hospital, the first ever in Central Luzon.</p>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('view-auf-history.pdf', 'I');
