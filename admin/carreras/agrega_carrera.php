
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];

switch($proceso){
	case 'Registro': mysqli_query($conexion, "INSERT INTO carreras (NombreCarrera) VALUES('$nombre')");
	break;
	case 'Edicion': mysqli_query($conexion, "UPDATE carreras SET NombreCarrera = '$nombre' where idCarrera = '$id'");
	break;
   }
    $registro = mysqli_query($conexion, "SELECT * FROM carreras ORDER BY idCarrera ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                        <th width="80%">Nombre de idCarrera</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                      <td>'.$registro2['NombreCarrera'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idCarrera'].');">
                          <img src="images/editar.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idCarrera'].');">
                          <img src="images/borrar2.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                </tr>';
  }
	
   echo '</table>';
?>