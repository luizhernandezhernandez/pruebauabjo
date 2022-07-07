
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

                $consulta=mysqli_query($conexion, "select Foto from estudiantes where idEstudiante = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }


                  $consulta3 =  mysqli_query($conexion, "SELECT CONCAT(estudiantes.NombresEstudiante, ' ', estudiantes.ApellidosEstudiante) as Estudiante FROM usuarios INNER JOIN estudiantes ON usuarios.Codigo = estudiantes.idEstudiante where usuarios.NivelUsuario ='3' AND usuarios.Codigo = $codigo");
                  while($filas3=mysqli_fetch_array($consulta3)){
                         $estudiante=$filas3['Estudiante'];                           
                 }

                 $consulta2 = mysqli_query($conexion, "select concat (NombresEstudiante, ' ', ApellidosEstudiante) as Estudiante from estudiantes where idEstudiante = $codigo"); 
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $estudiante=$filas2['Estudiante'];                           
                 }
                 ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IndexEstudiantes</title>
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
</head>

<body>
<?php
include ('menu_inicio_estudiante.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">  

               <center> <h2 style="color:black; font-family: gotic; " >PANEL DE ESTUDIANTES </h2></center>     

             </div>
             <br>
               <div class="col-md-3">
               
               <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> 
              <?php echo $estudiante ?>
             
              </h5><br>
               </div> 

            </div>

            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li class="active">Estudiantes</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <center><p style=" font-size: 14px; ">Bienvenido(a). En esta sección del sistema usted podrá inscribir las asignaturas correspondientes a su año y carrera, además de ver y descargar los archivos de apoyo de las clases impartidas, entregar tareas, calificaciones  y ver las notas asignadas a estas tareas.</p></center>
            <br>
            <?php
include ('menu_estudiante.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h3>Bienvenido Estudiante : <b style="color:green;"><?php echo $estudiante; ?></b></h3>
               <br>

                  <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center"  >
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x" >
                             <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-files-o fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Inscripciones</h4>
                        <a href="inscripcion_asignatura2.php" class="btn btn-primary"> <i class="glyphicon glyphicon-hand-right"></i>   Entrar</a>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-folder-open fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Material de Estudio</h4>
                        <a href="material_didactico.php" class="btn btn-primary"><i class="glyphicon glyphicon-hand-right"></i>  Entrar</a>
                    </div>
                </div>
            </div>
          
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-file-pdf-o fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Tareas Asignadas</h4>
                        <a href="tareas_recibidas.php" class="btn btn-primary"><i class="glyphicon glyphicon-hand-right"></i>   Entrar</a>
                    </div>
                </div>
            </div>

              <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                               <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-plus-circle fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Entregar Tareas</h4>
                        <a href="entrega_tarea.php" class="btn btn-primary"><i class="glyphicon glyphicon-hand-right"></i>   Entrar</a>
                    </div>
                </div>
            </div>

              <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-list-ol fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Mis Calificaciones</h4>
                        <a href="mis_calificaciones.php" class="btn btn-primary"><i class="glyphicon glyphicon-hand-right"></i>   Entrar</a>
                    </div>
                </div>
            </div>

              <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-line-chart fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Mis Estadisticas</h4>
                        <a href="tareas_recibidas.php" class="btn btn-primary"><i class="glyphicon glyphicon-hand-right"></i>   Entrar</a>
                    </div>
                </div>
            </div>


        </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
   
</body>

</html>

<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../login.php"; </script>';
}
?>
