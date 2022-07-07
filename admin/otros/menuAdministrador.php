       <?php
       include ('conexion.php');

        $TotalEstudiantes = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM estudiantes"));
        $TotalDocentes = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM docentes"));
        $TotalAsignaturas = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM asignaturas"));
        $TotalCarreras = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM carreras"));
        $TotalSemestre = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM semestres"));
        $TotalGrupos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM grupos"));
        $TotalHorarios = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM horarios"));
        $TotalTurnos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM turnos"));
        $TotalUsuarios = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM usuarios WHERE NivelUsuario = '1'" ));
        $TotalAñoAcademico = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM año_academico"));
        $TotalPlanesEstudio = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM plan_estudio"));
        $TotalNumeroAsignaciones = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM numeros_asignaciones"));
        $TotalUsuarios = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM usuarios WHERE NivelUsuario = '1'"));
        $TotalAsignaciones = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM asignaciones"));
        $TotalInscripciones = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM inscripciones_asignaturas"));
         
        ?>

         <div class="row">
            <div class="col-lg-12">
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                            <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD;"></i>
                            <i class="fa fa-child fa-stack-1x fa-inverse" style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body" >
                        <h4 class="media-heading">Estudiantes</h4>
                         <p>Total de Estudiantes: <span class="label label-danger pull-right"><?php echo $TotalEstudiantes ?></span></p>
                         <a href="estudiantes.php" style="color:black;" class="btn btn-success" ><i class="fa fa-hand-o-right" ></i>  Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color: #87A1BD"></i>
                              <i class="fa fa-sign-in fa-stack-1x fa-inverse" style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Asignaciones</h4>
                       <p>Total de Asignaciones: <span class="label label-danger pull-right"><?php echo $TotalAsignaciones ?></span></p>
                      <a href="asignaciones.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-list-alt fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Planes de Estudio</h4>
                         <p>Total Planes de Estudio: <span class="label label-danger pull-right"><?php echo $TotalPlanesEstudio ?></span></p>
                       <a href="planes_estudio.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-sort-numeric-asc fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Asignaciones a Docentes</h4>
                         <p>Total de Asignaciones a Docentes: <span class="label label-danger pull-right"><?php echo $TotalNumeroAsignaciones ?></span></p>
                       <a href="numero_asignaciones.php"  style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-lg-12">
            </div>
                        <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-clipboard fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Incripciones Asignaturas</h4>
                        <p>Total de Inscripciones: <span class="label label-danger pull-right"><?php echo $TotalInscripciones ?></span></p>
                        <a href="inscripcion_Asignatura.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                       <h4 class="media-heading">Asignaturas</h4>
                       <p>Total de Asignaturas: <span class="label label-danger pull-right"><?php echo $TotalAsignaturas ?></span></p>
                       <a href="asignaturas.php"  style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-calendar fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="media-heading">Año Académico</h4>
                       <p>Total de Años Académicos: <span class="label label-danger pull-right"><?php echo $TotalAñoAcademico ?></span></p>
                        <a href="anios_academicos.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-graduation-cap fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Carreras</h4>
                     <p>Total de Carreras: <span class="label label-danger pull-right"><?php echo $TotalCarreras ?></span></p>
                      <a href="carreras.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-th fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                          <h4 class="media-heading">Semestres</h4>
                      <p>Total de Semestres: <span class="label label-danger pull-right"><?php echo $TotalSemestre ?></span></p>
                      <a href="semestre.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-list-ol fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Grupos</h4>
                      <p>Total de Grupos: <span class="label label-danger pull-right"><?php echo $TotalGrupos ?></span></p>
                      <a href="grupos.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-sort-amount-desc fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Turnos</h4>
                        <p>Total de Turnos: <span class="label label-danger pull-right"><?php echo $TotalTurnos ?></span></p>
                        <a href="turnos.php"  style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-calendar-o fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">Horarios</h4>
                        <p>Total de Horarios: <span class="label label-danger pull-right"><?php echo $TotalHorarios ?></span></p>
                      <a href="horarios.php"  style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-group fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Docentes</h4>
                       <p>Total de Docentes: <span class="label label-danger pull-right"><?php echo $TotalDocentes ?></span></p>
                       <a href="docentes.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Backups</h4>
                      <p>Copia de seguridad de BD <span class="label label-danger pull-right"></span></p>
                      <a href="copias_seguridad.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-lock fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Administradores</h4>
                        <p>Total de Administradores: <span class="label label-danger pull-right"><?php echo $TotalUsuarios ?></span></p>
                        <a href="usuarios.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
           

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-cogs fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">Configuración</h4>
                        <p>Configuración de Cuenta<span class="label label-danger pull-right"></span></p>
                      <a href="cambiar_foto.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
                              <i class="fa fa-heart-o fa-stack-1x fa-inverse"style="font-size:48px;color:#F8D20F;"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">¡Ayuda!</h4>
                        <p>Manual de Usuario<span class="label label-danger pull-right"></span></p>
                      <a href="ayuda.php" style="color:black;" class="btn btn-success"><i class="fa fa-hand-o-right"></i>  Entrar</a>
                    </div>
                    
                </div>
            </div>
        </div>