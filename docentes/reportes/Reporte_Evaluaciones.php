<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];

class PDF extends FPDF
{
		function Header()
		{
			$this->Image('../../imagenes/paulo2.png' , 10 ,10, 30 , 30,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(160);
			$this->Cell(50,20,'Reporte de Evaluaciones',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(300);
			$this->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(10);
           // $this->SetFont('Arial','B',12);
		   // $this->Cell(20,20,'Mis Asignaciones:',0,0,'L');
		    

		 
			
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		    $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, utf8_decode('#') ,1,0,'C');
			$this->Cell(50, 8, utf8_decode('Observaciones') ,1,0,'C');
			$this->Cell(45, 8, utf8_decode('Estudiante') ,1,0,'C');
			$this->Cell(38, 8, utf8_decode('Asignatura') ,1,0,'C');
			$this->Cell(25, 8, utf8_decode('Unidad') ,1,0,'C');
			$this->Cell(35, 8, utf8_decode('Tarea') ,1,0,'C');
			$this->Cell(45, 8, utf8_decode('Docente') ,1,0,'C');
			$this->Cell(25, 8, utf8_decode('Calificación') ,1,0,'C');
			$this->Cell(45, 8, utf8_decode('Fecha de evaluación') ,1,0,'C');
			$this->Ln(5);
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
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);
		//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion, "SELECT evaluaciones.idEvaluacion as IdEvaluación, evaluaciones.Descripcion as Descripción, concat (estudiantes.NombresEstudiante) as estudiante, concat (asignaturas.NombreAsignatura) as asignatura, evaluaciones.Unidad as Unidad, evaluaciones.Tarea as Tarea, concat (docentes.NombresDocente) as Docente, evaluaciones.Puntaje as Puntaje, evaluaciones.FechaEvaluacion As fecha FROM evaluaciones, docentes, estudiantes, asignaturas WHERE evaluaciones.idAsignatura=asignaturas.idAsignatura AND evaluaciones.idEstudiante=estudiantes.idEstudiante AND evaluaciones.idDocente=docentes.idDocente AND docentes.idDocente='$codigo'");
        
        $item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0);
				$pdf->Cell(50, 8, utf8_decode($asignaciones2['Descripción']), 0);
				$pdf->Cell(45, 8, utf8_decode($asignaciones2['estudiante']), 0);
				$pdf->Cell(38, 8, utf8_decode($asignaciones2['asignatura']), 0);
				$pdf->Cell(25, 8, $asignaciones2['Unidad'], 0);
			    $pdf->Cell(35, 8, $asignaciones2['Tarea'], 0);
			   	$pdf->Cell(45, 8, $asignaciones2['Docente'], 0);
			   	$pdf->Cell(25, 8, $asignaciones2['Puntaje'], 0);
			   	$pdf->Cell(45, 8, $asignaciones2['fecha'], 0);
				$pdf->Ln(5);
			}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>