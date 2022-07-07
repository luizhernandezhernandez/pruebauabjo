<?php
require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
class PDF extends FPDF
{
function Header()
{

	$this->Image('../../imagenes/paulo2.png' ,10 ,10, 30 , 30,'PNG');
	$this->SetFont('Arial','B',20);
	$this->Cell(160);
	$this->Cell(50,20,'Reporte de Calificaciones',0,0,'C');
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
	$this->Cell(13, 8,  utf8_decode('No'),1,0,'C');
	$this->Cell(75, 8,  utf8_decode('Observaciones'),1,0,'C');
	$this->Cell(45, 8,  utf8_decode('Asignatura'),1,0,'C');
	$this->Cell(45, 8,  utf8_decode('Unidad') ,1,0,'C');
	$this->Cell(45, 8,  utf8_decode('Tarea') ,1,0,'C');
	$this->Cell(50, 8,  utf8_decode('Docente') ,1,0,'C');
	$this->Cell(30, 8,  utf8_decode('Calificación') ,1,0,'C');
	$this->Cell(35, 8,  utf8_decode('Fecha Evaluación') ,1,0,'C');
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
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(70, 8, '', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 9);
//CONSULTA
$productos = mysqli_query($conexion, "SELECT * FROM evaluaciones 
	INNER JOIN docentes ON evaluaciones.idDocente = docentes.idDocente 
	INNER JOIN estudiantes ON evaluaciones.idEstudiante = estudiantes.idEstudiante WHERE estudiantes.idEstudiante= '$codigo' ");
$item = 0;
while($productos2 = mysqli_fetch_array($productos)){
	$item = $item+1;
	$pdf->Cell(13, 8, $item, 0);
	$pdf->Cell(75, 8,utf8_decode($productos2['Descripcion']), 0);
	$pdf->Cell(45, 8,utf8_decode($productos2['idAsignatura']), 0);
	$pdf->Cell(45, 8,utf8_decode($productos2['Unidad']), 0);
	$pdf->Cell(45, 8, utf8_decode($productos2['Tarea']), 0);
    $pdf->Cell(50, 8,utf8_decode($productos2['NombresDocente']), 0);
   	$pdf->Cell(30, 8, $productos2['Puntaje'], 0);
   	$pdf->Cell(35, 8, $productos2['FechaEvaluacion'], 0);
   	
	$pdf->Ln(5);
}
$pdf->Ln(8);
//$pdf->Cell(0, 10, 'Pagina: '.$pdf->PageNo(),0,0,'C');
//$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
$pdf->Output(); //Esta opcion es para ver en linea el documento
?>