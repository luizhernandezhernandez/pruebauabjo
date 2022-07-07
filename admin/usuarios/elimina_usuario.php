<?php
include('../conexion.php');

$id = $_POST['id'];


mysqli_query($conexion, "DELETE FROM usuarios WHERE idUsuario = '$id'");


$registro = mysqli_query($conexion, "SELECT * FROM usuarios WHERE NivelUsuario = '1' ORDER BY idUsuario ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">Nombre Usuario</th>
                         <th width="20%">Contraseña</th>
                         <th width="20%">Alias</th>
                         <th width="10%">Nivel usuario</th>
                         <th width="10%">Código</th>            
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                            <td>'.$registro2['NombreUsuario'].'</td>
                                <td>'.$registro2['PassUsuario'].'</td>
                                <td>'.$registro2['Alias'].'</td>
                                <td>'.$registro2['NivelUsuario'].'</td>
                                 <td>'.$registro2['Codigo'].'</td>
                               <td> <a href="javascript:editarRegistro('.$registro2['idUsuario'].');">
                              <img src="images/editar.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idUsuario'].');">
                              <img src="images/borrar2.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                        </td>
			         	</tr>';
	}
echo '</table>';
?>