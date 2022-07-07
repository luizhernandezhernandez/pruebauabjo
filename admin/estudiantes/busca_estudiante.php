<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT estudiantes.idEstudiante, estudiantes.CarnetEstudiante as Carnet, estudiantes.NombresEstudiante as nombre, estudiantes.ApellidosEstudiante as apellidos,estudiantes.CedulaEstudiante as contraseña, estudiantes.Alias as alias, estudiantes.CorreoEstudiante as correo, estudiantes.CelularEstudiante as celular, estudiantes.TelefonoEstudiante as telefono, estudiantes.DireccionEstudiante as direccion, estudiantes.Estado as estado, grupos.NombreGrupo as grupo FROM estudiantes, grupos 
  WHERE estudiantes.idGrupo=grupos.idGrupo AND estudiantes.NombresEstudiante LIKE '%$dato%' ORDER BY estudiantes.idEstudiante ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        <th width="5%">Carnet</th>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="5%">Contraseña</th>
                         <th width="10%">Alias</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Teléfono</th>
                         <th width="10%">Dirección</th>
                         <th width="5%">Estado</th> 
                          <th width="5%">Grupo</th>             
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
		      <td>'.$registro2['Carnet'].'</td>
                  <td>'.$registro2['nombre'].'</td>
                  <td>'.$registro2['apellidos'].'</td>
                  <td>'.$registro2['contraseña'].'</td>
                   <td>'.$registro2['alias'].'</td>
                   <td>'.$registro2['correo'].'</td>
                  <td>'.$registro2['celular'].'</td>
                  <td>'.$registro2['telefono'].'</td>
                  <td>'.$registro2['direccion'].'</td>
                  <td>'.$registro2['estado'].'</td>
                   <td>'.$registro2['grupo'].'</td>
                  <td> <a href="javascript:editarRegistro('.$registro2['idEstudiante'].');">
                  <img src="images/editar.png" width="25" height="29" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idEstudiante'].');">
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
