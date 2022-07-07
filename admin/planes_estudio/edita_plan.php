<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion, "SELECT * FROM plan_estudio WHERE idPlan = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['Descripcion'], 
				1 => $valores2['idCarrera'], 
                2 => $valores2['CantidadAsignaturas'], 
				); 

echo json_encode($datos);
?>