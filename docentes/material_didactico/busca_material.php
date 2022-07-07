<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysqli_query($conexion, "SELECT material_didactico.idMaterialDidactico as id, material_didactico.Descripcion as Descripcion, material_didactico.Archivo as Archivo, material_didactico.CodigoMaterial as CodigoM, material_didactico.Fecha_subida as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM material_didactico 
INNER JOIN numeros_asignaciones ON material_didactico.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
INNER JOIN docentes ON  material_didactico.idDocente =  docentes.idDocente
WHERE material_didactico.CodigoMaterial LIKE '%$dato%' and material_didactico.idDocente = '$codigo' ORDER BY material_didactico.idMaterialDidactico ASC");


       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                      
                        <th width="20%">Descripcion</th> 
                        <th width="20%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="15%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                         
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['CodigoM'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="material_didactico/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo2.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="6">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
