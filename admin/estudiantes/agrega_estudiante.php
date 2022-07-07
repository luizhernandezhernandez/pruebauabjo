
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$carnet = $_POST['carnet'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$alias = $_POST['alias'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$grupo = $_POST['grupo'];
$foto = "images/fotos_perfil/perfil.jpg";

switch($proceso){
	case 'Registro': mysqli_query($conexion, "INSERT INTO estudiantes (CarnetEstudiante, NombresEstudiante, ApellidosEstudiante, CedulaEstudiante, Alias , CorreoEstudiante, CelularEstudiante, TelefonoEstudiante, DireccionEstudiante, Estado, idGrupo, Foto) VALUES('$carnet','$nombre','$apellido','$cedula','$alias','$correo','$celular','$telefono','$direccion','$estado', '$grupo', '$foto')");

          $consulta=mysqli_query($conexion, "SELECT idEstudiante from estudiantes where CarnetEstudiante = '$carnet' and CorreoEstudiante = '$correo'");              
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_estudiante=$filas['idEstudiante'];                           
                 }
     mysqli_query($conexion, "INSERT INTO usuarios (NombreUsuario, PassUsuario, Alias , NivelUsuario, Codigo) VALUES('$correo','$cedula', '$alias' ,'3','$codigo_estudiante')");
	
  break;

	case 'Edicion': mysqli_query($conexion, "UPDATE estudiantes SET CarnetEstudiante = '$carnet', NombresEstudiante = '$nombre', ApellidosEstudiante = '$apellido', CedulaEstudiante = '$cedula', Alias = '$alias', CorreoEstudiante = '$correo', CelularEstudiante = '$celular', TelefonoEstudiante = '$telefono', DireccionEstudiante = '$direccion', Estado = '$estado' , idGrupo = '$grupo' where idEstudiante = '$id'");

  mysqli_query($conexion, "UPDATE usuarios SET NombreUsuario = '$correo', PassUsuario = '$cedula' , Alias = '$alias' where NivelUsuario = '3' and Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion, "SELECT estudiantes.idEstudiante, estudiantes.CarnetEstudiante as Carnet, estudiantes.NombresEstudiante as nombre, estudiantes.ApellidosEstudiante as apellidos,estudiantes.CedulaEstudiante as contraseña, estudiantes.Alias as alias, estudiantes.CorreoEstudiante as correo, estudiantes.CelularEstudiante as celular, estudiantes.TelefonoEstudiante as telefono, estudiantes.DireccionEstudiante as direccion, estudiantes.Estado as estado, grupos.NombreGrupo as grupo FROM estudiantes, grupos 
  WHERE estudiantes.idGrupo=grupos.idGrupo ORDER BY idEstudiante ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                        <th width="5%">Carnet</th>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="5%">Contraseña</th>
                          <th width="10%">Alias</th>
                          <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Télefono</th>
                         <th width="10%">Dirección</th>
                         <th width="5%">Estado</th> 
                          <th width="5%">Grupo</th>             
                        <th width="10%">Opciones</th>
            </tr>';
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
   echo '</table>';
?>