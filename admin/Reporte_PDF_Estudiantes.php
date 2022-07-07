<?php

require('fpdf/fpdf.php');
require('conexion.php');

class PDF extends FPDF
{
function Header()
{

	$this->Image('../imagenes/paulo2.png' ,10 ,10, 30 , 30,'PNG');
	$this->SetFont('Arial','B',20);
	$this->Cell(160);
	$this->Cell(50,20,'Reporte de Estudiantes',0,0,'C');
	$this->Ln(15);
	$this->SetFont('Arial','B',10);
	$this->Cell(300);
	$this->Cell(50, 10, 'Fecha: '.date('d-m-y').'', 0, 'R');
	$this->Ln(10);
		 // Colores de los bordes, fondo y texto
    $this->SetDrawColor(222,227,221);
     $this->SetFillColor(200,220,255);
   // $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
   // $this->SetLineWidth(1);

	$this->Cell(10, 8, '#' ,1,0,'C');
	$this->Cell(26, 8, 'N Control' ,1,0,'C');
	$this->Cell(47, 8,utf8_decode ('Nombres') ,1,0,'C');
	$this->Cell(40, 8,utf8_decode ('Apellidos') ,1,0,'C');
	$this->Cell(25, 8,utf8_decode ('Alias') ,1,0,'C');
	$this->Cell(26, 8,utf8_decode ('Contraseña') ,1,0,'C');
	$this->Cell(43, 8,utf8_decode ('Email') ,1,0,'C');
	$this->Cell(28, 8, 'Celular' ,1,0,'C');
	$this->Cell(24, 8, utf8_decode('Télefono'),1,0,'C');
	$this->Cell(55, 8,utf8_decode ('Dirección') ,1,0,'C');
	$this->Cell(20, 8,'Estado' ,1,0,'C');
	$this->Ln(8);
}
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10,'Pagina '.$this->PageNo().' / {nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
//$pdf = new PDF();
$pdf = new PDF('L','mm','legal'); //Tamaño en forma Horizontal
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
//$pdf = new FPDF('P','mm','letter'); //Tamaño Normal
//$pdf->AddPage();
//$title = 'Reporte de Productos';
//$pdf->SetTitle($title);
//$pdf->SetFont('Arial', '', 10);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8,'', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysqli_query($conexion, "SELECT * FROM estudiantes");
$item = 0;
while($productos2 = mysqli_fetch_array($productos)){
	$item = $item+1;
	$pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(26, 8, $productos2['CarnetEstudiante'], 0);
	$pdf->Cell(47, 8,utf8_decode($productos2['NombresEstudiante']), 0);
	$pdf->Cell(40, 8,utf8_decode($productos2['ApellidosEstudiante']), 0);
	$pdf->Cell(25, 8,utf8_decode($productos2['Alias']), 0);
	$pdf->Cell(26, 8, $productos2['CedulaEstudiante'], 0);
    $pdf->Cell(43, 8,utf8_decode($productos2['CorreoEstudiante']), 0);
   	$pdf->Cell(28, 8, $productos2['CelularEstudiante'], 0);
   	$pdf->Cell(24, 8, $productos2['TelefonoEstudiante'], 0);
   	$pdf->Cell(55, 8,utf8_decode ($productos2['DireccionEstudiante']), 0);
   	$pdf->Cell(10, 8,$productos2['Estado'], 0);
	$pdf->Ln(5);
}
$pdf->Ln(8);
//$pdf->Cell(0, 10, 'Pagina: '.$pdf->PageNo(),0,0,'C');
//$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
$pdf->Output(); //Esta opcion es para ver en linea el documento
?>