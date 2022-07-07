  <?php
       // session_start();
        $codigo = $_SESSION["Codigo"];
        include ('../admin/conexion.php');

        $inscripciones = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas where idEstudiante = $codigo"));
        $tareas = mysqli_num_rows(mysqli_query($conexion, "SELECT entrega_tareas.idEntregaTareas as id, entrega_tareas.CodigoTareaDocente CodigoDocente, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion,  entrega_tareas.CodigoEnvioTarea as CodigoTarea, entrega_tareas.Archivo as Archivo
            FROM  entrega_tareas INNER JOIN asignaturas ON  entrega_tareas.idAsignatura =  asignaturas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
            where estudiantes.idEstudiante = '$codigo'"));
    
    ?>

<div class="col-md-3">
                <div class="list-group">
                    <a class="list-group-item active">Catálogo del Estudiante</a>
         <a href="inscripcion_asignatura2.php" class="list-group-item"><i class="glyphicon glyphicon-pencil"></i>   &nbsp;&nbsp;Asignaturas Inscritas
                     <span class="label label-warning pull-right"><?php echo $inscripciones ?></span>
                    </a>
            <a href="material_didactico.php" class="list-group-item"><i class="glyphicon glyphicon-folder-open"></i>   &nbsp;&nbsp; Materiales de Estudio
                    </a>
            <a href="tareas_recibidas.php" class="list-group-item"><i class="glyphicon glyphicon-share"></i>   &nbsp;&nbsp; Tareas Asignadas
                    </a>
        <a href="entrega_tarea.php" class="list-group-item"><i class="glyphicon glyphicon-file"></i>   &nbsp;&nbsp; Mis Tareas
                     <span class="label label-warning pull-right"><?php echo $tareas ?></span>
                    </a>

         <a href="mis_calificaciones.php" class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i>   &nbsp;&nbsp; Mis Calificaciones
                    </a>
         
         <a href="cambiar_foto.php" class="list-group-item"><i class="glyphicon glyphicon-user"></i>   &nbsp;&nbsp; Configuración
                    </a>
                    <br>
                </div>

            </div>