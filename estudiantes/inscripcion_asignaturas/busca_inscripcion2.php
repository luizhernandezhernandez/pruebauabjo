<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT inscripciones_asignaturas.idInscripcion as id, inscripciones_asignaturas.fechaInscripcion as Fecha, inscripciones_asignaturas.observaciones as Observaciones, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera 
FROM             asignaturas INNER JOIN inscripciones_asignaturas ON  asignaturas.idAsignatura =  inscripciones_asignaturas.idAsignatura
                             INNER JOIN estudiantes ON  inscripciones_asignaturas.idEstudiante =  estudiantes.idEstudiante 
               INNER JOIN carreras ON  asignaturas.idCarrera =  carreras.idCarrera 
             
WHERE estudiantes.idEstudiante = '$codigo' and asignaturas.NombreAsignatura LIKE '%$dato%' ORDER BY inscripciones_asignaturas.idInscripcion ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                        <th width="25%">Asignatura</th> 
                        <th width="20%">Carrera</th>
                        <th width="20%">Fecha</th> 
                        <th width="35%">Observaciones</th>  

                        
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['Fecha'].'</td> 
                          <td>'.$registro2['Observaciones'].'</td>              
                           <td>
                                                                     
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
