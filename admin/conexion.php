<?php
$conexion =new mysqli("localhost", "root", "","validacionelectronica1");
if($conexion->connect_errno)
	{
		echo "No hay conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}
?>
