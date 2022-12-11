<?php

require "../vendor/autoload.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jeremiah Quiambao');
$pdf->SetTitle('My January Calendar 2023 PDF');
$pdf->SetSubject('PDC10 TCPDF Activity');
$pdf->SetKeywords('TCPDF, PDF, Activity, Calendar, 2023');

// set default header data
$pdf->SetHeaderData("", "0", "My January Calendar 2023", "", array(8,106,115), array(10, 24, 26));
$pdf->setFooterData(array(0,64,0), array(0,64,128));


$pdf->setPrintFooter(true);
$pdf->setPrintHeader(true);

$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage('L');

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);

$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
$pdf->Ln(14);
// Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr>
  <th width="780" align="center" ><b>JANUARY 2023</b></th>
 </tr>
 <tr>
  <td width="110" align="center" style="background-color:#c991a7;color:white"><b>SUN</b></td>
  <td width="110" align="center"><b>MON</b></td>
  <td width="110" align="center"><b>TUES</b></td>
  <td width="110" align="center"> <b>WED</b></td>
  <td width="110" align="center"><b>THURS</b></td>
  <td width="110" align="center"><b>FRI</b></td>
  <td width="110" align="center"><b>SAT</b></td>
 </tr>
</thead>
 <tr align="right" style="font-weight:400;">
 <td width="110" style="background-color:#db2e70;color:white"><b>1</b><br /><br /><span style="text-align:center;">New Year's day</span><br /></td>
 <td width="110" style="background-color:#db2e70;color:white"><b>2</b><br /><br /><span style="text-align:center;">(Special non-working day)</span></td>
 <td width="110"><b>3</b></td>
 <td width="110"><b>4</b></td>
 <td width="110"><b>5</b></td>
 <td width="110"><b>6</b></td>
 <td width="110"><b>7</b></td>
 </tr>
 <tr align="right">
 <td width="110" style="background-color:#c991a7;color:white"><b>8</b><br /><br /><br /></td>
 <td width="110"><b>9</b></td>
 <td width="110"><b>10</b></td>
 <td width="110"><b>11</b></td>
 <td width="110"><b>12</b></td>
 <td width="110"><b>13</b></td>
 <td width="110"><b>14</b></td>
 </tr>
 <tr align="right">
 <td width="110" style="background-color:#c991a7;color:white"><b>15</b><br /><br /><br /></td>
 <td width="110"><b>16</b></td>
 <td width="110"><b>17</b></td>
 <td width="110"><b>18</b></td>
 <td width="110"><b>19</b></td>
 <td width="110"><b>20</b></td>
 <td width="110"><b>21</b></td>
 </tr>
 <tr align="right">
 <td width="110" style="background-color:#c991a7;color:white"><b>22</b><br /><br /><br /></td>
 <td width="110"><b>23</b></td>
 <td width="110"><b>24</b></td>
 <td width="110"><b>25</b></td>
 <td width="110"><b>26</b></td>
 <td width="110"><b>27</b></td>
 <td width="110"><b>28</b></td>
 </tr>
 <tr align="right">
 <td width="110" style="background-color:#c991a7;color:white"><b>29</b><br /><br /><br /></td>
 <td width="110"><b>30</b></td>
 <td width="110"><b>31</b></td>
 <td width="110" style="color:#808080;"><b>1</b></td>
 <td width="110" style="color:#808080;"><b>2</b></td>
 <td width="110" style="color:#808080;"><b>3</b></td>
 <td width="110" style="color:#808080;"><b>4</b></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// Close and output PDF document
$pdf->Output('view-calendar.pdf', 'I');

