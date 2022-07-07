<?php 
session_start();
//$codigo = $_SESSION["Codigo"];
include ('../conexion.php');



$carrera=$_POST['carrera'];
$Año=$_POST['Año'];
$semestre=$_POST['semestre'];
$asignatura=$_POST['asignaturas'];
$estudiante=$_POST['estudiante'];
$fecha = date("Y-m-d");
$observaciones=$_POST['observaciones'];
 
$guardar = mysqli_query($conexion,"INSERT INTO inscripciones_asignaturas (idCarrera, idAño, idSemestre, idAsignatura, idEstudiante, fechaInscripcion, observaciones) VALUES('$carrera','$Año','$semestre','$asignatura','$estudiante','$fecha','$observaciones')");
					if ($guardar) {
							  echo '<script> alert("Inscripcion Realizada Correctamente.");</script>';
					       echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
					}
					else
					{
							  echo '<script> alert("Error al Inscribir la asignatura. Intente de Nuevo.");</script>';
					          echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
					}
?>
