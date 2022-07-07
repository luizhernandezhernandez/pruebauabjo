<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysql_num_rows(mysql_query("SELECT * FROM inscripciones_asignaturas"));
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
  	$registro = mysql_query("SELECT inscripciones_Asignaturas.idInscripcion as id, inscripciones_Asignaturas.fechaInscripcion as fecha, inscripciones_Asignaturas.observaciones as observaciones, asignaturas.NombreAsignatura as Asignatura, carreras.NombreCarrera as Carrera
FROM             asignaturas INNER JOIN inscripciones_Asignaturas ON  asignaturas.idAsignatura =  inscripciones_Asignaturas.idAsignatura
                             INNER JOIN estudiantes ON  inscripciones_Asignaturas.idEstudiante =  estudiantes.idEstudiante 
               INNER JOIN carreras ON  asignaturas.idCarrera =  carreras.idCarrera 
              
               
WHERE estudiantes.idEstudiante = '$codigo' LIMIT $limit, $nroLotes ");

  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                         <th width="25%">Asignatura</th> 
                        <th width="20%">Carrera</th>
                        <th width="20%">Fecha</th> 
                        <th width="30%">Observaciones</th>                 
                       
                   </tr>';		
          	while($registro2 = mysql_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                            <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Carrera'].'</td>
                          <td>'.$registro2['fecha'].'</td> 
                          <td>'.$registro2['observaciones'].'</td>              
                           
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>