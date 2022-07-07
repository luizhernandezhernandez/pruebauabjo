<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT * FROM año_academico WHERE NombreAño LIKE '%$dato%' ORDER BY idAñoAcademico ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="80%">Año Académico</th>           
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
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
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
