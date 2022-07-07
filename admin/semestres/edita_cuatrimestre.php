<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM semestres WHERE idSemestre = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreSemestre'], 
				); 
echo json_encode($datos);
?>