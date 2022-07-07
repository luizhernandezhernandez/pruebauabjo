<?php

require('../fpdf/fpdf.php');
require('../conexion.php');

class PDF extends FPDF
{
		function Header()
		{
			$this->Image('../../imagenes/paulo2.png' , 10 ,10, 30 , 30,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(160);
			$this->Cell(50,20,'Reporte de Asignaciones',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(300);
			$this->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(10);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
			$this->Cell(5, 8, '#' ,1,0,'C');
			$this->Cell(55, 8, utf8_decode('Asignación') ,1,0,'C');
			$this->Cell(23, 8, 'Numero' ,1,0,'C');
			$this->Cell(65, 8, 'Docente' ,1,0,'C');
			$this->Cell(55, 8, 'Asignatura' ,1,0,'C');
			$this->Cell(25, 8, 'Grupo' ,1,0,'C');
			$this->Cell(40, 8, 'Turno' ,1,0,'C');
			$this->Cell(40, 8, 'Horario' ,1,0,'C');
			$this->Cell(17, 8, 'Estado' ,1,0,'C');
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
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 11);
		//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion, "SELECT asignaciones.Descripcion AS Asignacion, concat(docentes.NombresDocente,' ',docentes.ApellidosDocente) as Docente, asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignaciones.NumeroAsignacion AS NumeroA, asignaciones.Estado AS Estado FROM asignaciones INNER JOIN docentes ON asignaciones.idDocente = docentes.idDocente 
		INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura 
		INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
		INNER JOIN turnos ON asignaciones.idTurno = turnos.idTurno  
		INNER JOIN horarios ON asignaciones.idHorario = horarios.idHorario");
        
        $item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(7, 8, $item, 0);
				$pdf->Cell(55, 8, utf8_decode($asignaciones2['Asignacion']), 0);
				$pdf->Cell(23, 8, $asignaciones2['NumeroA'], 0);
				$pdf->Cell(65, 8, utf8_decode($asignaciones2['Docente']), 0);
				$pdf->Cell(55, 8, utf8_decode($asignaciones2['Asignatura']), 0);
				$pdf->Cell(25, 8, $asignaciones2['Grupo'], 0,);
			    $pdf->Cell(40, 8, utf8_decode ($asignaciones2['Turno']), 0);
			   	$pdf->Cell(40, 8, utf8_decode ($asignaciones2['Horario']), 0);
			   	$pdf->Cell(17, 8, $asignaciones2['Estado'], 0);
				$pdf->Ln(5);
			}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>