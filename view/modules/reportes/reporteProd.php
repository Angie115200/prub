<?php
require('../../../view/plugins/FPDP/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

// Movernos a la derecha
$pdf->SetFont('Arial','B',16);
// Título
$pdf->Cell(60);
$pdf->Cell(60,10,'GestionINVZ',0,0,'C');
// Salto de línea
$pdf->Ln(20);
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(139, 251, 238);
$pdf->Cell(180,6,"REPORTE DEL PRODUCTO", 1, 1, "C", 1);
$pdf->SetFillColor(192, 254, 246);
$pdf->Cell(60,10,"Nombre", 1, 0, '', 1);
$pdf->Cell(60,10,"Referencia", 1, 0, '', 1);
$pdf->Cell(60,10,"Disponibilidad", 1, 1, '', 1);
$result =  $_GET['nombreP'];
$pdf->Cell(60,10,$result,1, 0);
$result =  $_GET['referenciaP'];
$pdf->Cell(60,10,$result,1, 0);
$result =  $_GET['disponibilidadP'];
$pdf->Cell(60,10,$result,1, 1);


$pdf->Output();
?>