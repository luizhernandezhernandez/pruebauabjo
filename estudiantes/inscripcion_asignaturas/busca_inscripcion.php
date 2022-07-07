<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT inscripciones_asignaturas.idInscripcion as Codigo, carreras.NombreCarrera as Carrera, asignaturas.NombreAsignatura as Asignatura, concat(estudiantes.NombresEstudiante) as Estudiantes, inscripciones_asignaturas.fechaInscripcion as fecha, inscripciones_asignaturas.observaciones as observaciones FROM inscripciones_asignaturas INNER JOIN carreras ON inscripciones_asignaturas.idCarrera=carreras.idCarrera INNER JOIN asignaturas ON inscripciones_asignaturas.idAsignatura=asignaturas.idAsignatura INNER JOIN estudiantes ON inscripciones_asignaturas.idEstudiante=estudiantes.idEstudiante");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        <th width="15%">Código</th>
                        <th width="15%">Carrera</th>
                        <th width="15%">Asignatura</th>
                        <th width="15%">Estudiante</th> 
                        <th width="15%">Fecha</th> 
                        <th width="20%">Observaciones</th>                 
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Estudiantes'].'</td>
                          <td>'.$registro2['fecha'].'</td>
                          <td>'.$registro2['observaciones'].'</td>              
                           <td>
                              <a href="javascript:eliminarRegistro('.$registro2['Codigo'].');">
                             <img src="../admin/images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
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
