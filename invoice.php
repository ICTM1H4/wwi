<?php


require('fpdf17/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190 , 10,'Orderbevestiging ', 0,1,"C");

$pdf->Cell(187,10,'Wide World Importers',0,1,'C');


$pdf->Output();

?>

