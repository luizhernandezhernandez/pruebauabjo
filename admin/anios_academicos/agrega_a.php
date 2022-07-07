
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];

switch($proceso){
	case 'Registro': mysqli_query($conexion, "INSERT INTO año_academico (NombreAño) VALUES('$nombre')");
	break;
	case 'Edicion': mysqli_query($conexion, "UPDATE año_academico SET NombreAño = '$nombre' where idAñoAcademico = '$id'");
	break;
   }
    $registro = mysqli_query($conexion, "SELECT * FROM año_academico ORDER BY idAñoAcademico ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                        <th width="80%">Año Académico</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                      <td>'.$registro2['NombreAño'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idAñoAcademico'].');">
                          <img src="images/editar.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idAñoAcademico'].');">
                          <img src="images/borrar2.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                </tr>';
  }
	
   echo '</table>';
?>