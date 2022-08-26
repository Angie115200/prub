<?php
require('../../../view/plugins/FPDP/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página


function Header()
{
	
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(60,10,'GestionINVZ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(160,10,'Reporte de salida ',1,0,'C');
    // Salto de línea
    $this->Ln(10);  
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}
//xd
$bd = mysqli_connect("localhost", "root", "", "GINVZ");
$result =  $_GET['codSalida'];
$consulta = "SELECT * FROM salida INNER JOIN detalle_salida ON salida.COD_SALIDA = $result;";
$resultado = mysqli_query($bd, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(139, 251, 238);
while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(61.7,10,'#Salida',1,0,'C',0);
	$pdf->Cell(61.7,10,'Fecha',1,0,'C',0);
    $pdf->Cell(61.7,10,'Cantidad',1,1,'C',0);
	$pdf->Cell(61.7,10,$row['COD_SALIDA'],1,0,'C',0);
	$pdf->Cell(61.7,10,$row['FECHA'],1,0,'C',0);
    $pdf->Cell(61.7,10,$row['CANTIDAD_TOTAL'],1,1,'C',0);
    $pdf->Cell(61.7,10,'#Detalle',1,0,'C',0);
    $pdf->Cell(61.7,10,'Cantidad unitaria',1,0,'C',0);
    $pdf->Cell(61.7,10,'Codigo de producto',1,1,'C',0);
    $pdf->Cell(61.7,10,$row['COD_DTSALIDA'],1,0,'C',0);
    $pdf->Cell(61.7,10,$row['CANTIDAD'],1,0,'C',0);
    $pdf->Cell(61.7,10,$row['COD_PRODUCTO'],1,1,'C',0);
   
   
}
$pdf->Output();



?>