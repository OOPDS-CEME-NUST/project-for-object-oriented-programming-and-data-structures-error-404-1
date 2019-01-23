<?php
$id=$_GET['id'];

$u=$_GET['name'];
$t=$_GET['t'];
 
 include 'fpdf.php';
 include 'exfpdf.php';
 include 'easyTable.php';
 $pdf=new exFPDF();
 $pdf->AddPage(); 
 $pdf->SetFont('helvetica','',10);
 $table=new easyTable($pdf, '%{30,30, 20, 20}', 'width:70; border:0; font-size:8; line-height:1.2; paddingX:0');
 $table->easyCell('Token:', 'colspan:4;font-style:B; font-size:20;line-height:0.6;');
 $table->printRow();
 $table->easyCell('Customer Name: '.$u, 'colspan:4');
 $table->printRow();
 
 $table->rowStyle('min-height:1.8;paddingY:0.02;');
 $table->easyCell('', 'colspan:4; bgcolor:#000;');
 $table->printRow();
 
 $table->easyCell('Time alloted:', 'colspan:4; border:B; border-color:#a1a1a1;');
 $table->printRow(); 
 
 $table->easyCell($t,'colspan:1; font-style:B;');
// $table->easyCell('Calories from Fat 130','colspan:3; align:R');
 $table->printRow();
 
 $table->easyCell('* We have recieved your request. Kindly be there on time','colspan:4;'); 
 $table->printRow();
 
 $table->endTable(12);

//##############################################################  
//##############################################################  

//##############################################################  
//##############################################################  
  
  
 $pdf->Output();  

?>