<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM asignaturas WHERE idAsignatura = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreAsignatura'], 
				1 => $valores2['idCarrera'], 
                 2 => $valores2['idGrupo'], 
                 3 => $valores2['idSemestre'], 
				); 

echo json_encode($datos);
?>