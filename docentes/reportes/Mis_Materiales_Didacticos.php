<?php
require('../../admin/conexion.php');
require('../fpdf/fpdf.php');

session_start();
//$Asignatura = $_POST['asignatura'];
$codigo = $_SESSION["Codigo"];

class PDF extends FPDF
{
		function Header()
		{
			$this->Image('../../imagenes/paulo2.png' , 10 ,10, 30 , 30,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(60,20,'Reporte de Materiales Didacticos',0,0,'C');
			$this->Ln(30);
			$this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Material Didactico del Docente:',0,0,'L');
			$this->SetFont('Arial','B',10);
			$this->Cell(140);
			$this->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(10);
			

		    
		       
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(40, 8, utf8_decode('Descripción') ,1,0,'C');
			$this->Cell(60, 8, 'Archivo' ,1,0,'C');
			$this->Cell(30, 8, utf8_decode('Código Material') ,1,0,'C');
			$this->Cell(25, 8, 'Fecha' ,1,0,'C');
			$this->Cell(25, 8, utf8_decode('N° Asignación') ,1,0,'C');
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
		$pdf = new PDF();
		//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 7);

			//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion, "SELECT  material_didactico.idMaterialDidactico AS id, material_didactico.idDocente as idDocente, material_didactico.Descripcion AS Descripcion, material_didactico.Archivo as Archivo, material_didactico.CodigoMaterial as Codigo, material_didactico.Fecha_Subida as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM material_didactico INNER JOIN numeros_asignaciones ON material_didactico.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
where material_didactico.idDocente = '$codigo'");
        
        if(mysqli_num_rows($asignaciones) > 0){
        $item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0);
				$pdf->Cell(40, 8, utf8_decode($asignaciones2['Descripcion']), 0);
				$pdf->Cell(60, 8, utf8_decode($asignaciones2['Archivo']), 0);
				$pdf->Cell(30, 8, $asignaciones2['Codigo'], 0);
			    $pdf->Cell(25, 8, $asignaciones2['Fecha'], 0);
			     $pdf->Cell(25, 8, $asignaciones2['Numero'], 0);
				$pdf->Ln(5);
			}

		}
	     else{
		
			 echo '<script> alert("No se han encontrado datos para esa asignatura.");</script>';
            echo '<script> window.location="../pantalla_reportes.php"; </script>';
		}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>