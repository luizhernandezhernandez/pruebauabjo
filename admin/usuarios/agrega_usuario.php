
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$alias = $_POST['alias'];
$nivel = $_POST['nivel'];
$codigo = $_POST['codigo'];




switch($proceso){

case 'Registro': mysqli_query($conexion, "INSERT INTO usuarios (NombreUsuario, PassUsuario, Alias, NivelUsuario, Codigo, Foto) VALUES('$nombre','$pass','$alias','1','$codigo', 'images/fotos_perfil/perfil.jpg')");

	break;
	case 'Edicion': mysqli_query($conexion, "UPDATE usuarios SET NombreUsuario = '$nombre', PassUsuario = '$pass', Alias = '$alias', NivelUsuario = '$nivel', Codigo = '$codigo' where idUsuario = '$id'");
    
	break;
   }
    $registro = mysqli_query($conexion, "SELECT * FROM usuarios WHERE NivelUsuario = '1' ORDER BY idUsuario ASC");

    echo '<table class="table table-striped table-condensed table-hover">
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