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
    $this->Cell(160,10,'Reporte de devoluciones ',1,0,'C');
    // Salto de línea
    $this->Ln(10);

   
    $this->Cell(40,10,'#Devolucion',1,0,'C',0);
	$this->Cell(40,10,'Fecha',1,0,'C',0);
    $this->Cell(40,10,'#Proveedor',1,0,'C',0);
	$this->Cell(30,10,'Cantidad',1,0,'C',0);
    $this->Cell(35,10,'Motivo',1,1,'C',0);
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

$bd = mysqli_connect("localhost", "root", "", "GINVZ");
$consulta = "SELECT * FROM devolucion";
$resultado = mysqli_query($bd, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(139, 251, 238);
while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,10,$row['COD_DEVOLUCION'],1,0,'C',0);
	$pdf->Cell(40,10,$row['FECHA'],1,0,'C',0);
    $pdf->Cell(40,10,$row['COD_PROVEEDOR'],1,0,'C',0);
	$pdf->Cell(30,10,$row['CANTIDAD_TOTAL'],1,0,'C',0);
    $pdf->Cell(35,10,$row['MOTIVO_DEVOLUCION'],1,1,'C',0);
    

} 


	$pdf->Output();


?>