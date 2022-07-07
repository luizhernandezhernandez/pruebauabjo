<?php
include('../conexion.php');
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM asignaturas"));
    $nroLotes = 10;
    $nroPaginas = ceil($numeroRegistros/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';

    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$registro = mysqli_query($conexion, "SELECT asignaturas.idAsignatura as id, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera, grupos.NumeroGrupo as grupo, 
semestres.NombreSemestre as Semestre FROM asignaturas 
                                 INNER JOIN carreras ON  asignaturas.idCarrera =  carreras.idCarrera 

                                 INNER JOIN semestres ON  asignaturas.idSemestre =  semestres.idSemestre 
                                 
                                 INNER JOIN grupos ON  asignaturas.idGrupo =  grupos.idGrupo
  LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        <th width="20%">Asignatura</th>  
                        <th width="20%">Carrera</th> 
                        <th width="20%">Grupo</th>
                        <th width="20%">Semestre</th>        
                        <th width="20%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                       <td>'.$registro2['Asignatura'].'</td>
		                      <td>'.$registro2['Carrera'].'</td>
		                      <td>'.$registro2['grupo'].'</td>
		                      <td>'.$registro2['Semestre'].'</td>
		                       <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
		                          <img src="images/editar.png" width="25" height="25" alt="delete" title="Editar" /></a>
		                          <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar2.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>