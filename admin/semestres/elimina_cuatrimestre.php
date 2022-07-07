<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion, "DELETE FROM semestres WHERE idSemestre = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion, "SELECT * FROM semestres ORDER BY idSemestre ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                        <th width="80%">Nombre de Semestre</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                  <td>'.$registro2['NombreSemestre'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idSemestre'].');">
                          <img src="images/editar.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idSemestre'].');">
                          <img src="images/borrar2.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
			         	</tr>';
	}
echo '</table>';
?>