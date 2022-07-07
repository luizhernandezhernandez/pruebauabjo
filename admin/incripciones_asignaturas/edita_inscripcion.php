<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas WHERE idInscripcion = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['idCarrera'],
				3 => $valores2['idAsignatura'],
				4 => $valores2['idEstudiante'],
				5 => $valores2['observaciones'], 

				); 
echo json_encode($datos);
?>