
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion, "select Foto from docentes where idDocente = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysqli_query($conexion, "select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $docente=$filas2['Docente'];                           
                 }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reportes</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
</head>

<body>
<?php
include ('menu_inicio_docente.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">         
               
                <center><h2 style="color:black; font-family: gotic; " >PANTALLA DE REPORTES </h2></center>
                     
             </div>
               <div class="col-md-3">
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> <?php echo $docente ?></h5><br>
               </div> 

            </div>

           
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                    <li class="active">Reportes por Docente</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <?php
include ('menu_docente.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9">
             <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Reportes Disponibles</b></h4></center>
        </div>
        <div class="panel-body">


             <div class="row">
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Asignaciones por Docente</h4>
                        <p>Este reporte muestra las asignaciones de las asignaturas que se le ha dado a cada docente.</p>
                              <a href="reportes/Mis_Asignaciones.php" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i>  Ver Reporte</a>
                    </div>
                </div>


                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-users fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Estudiantes por Asignatura</h4>
                        <p>Este reporte muestra la cantidad de estudiantes por cada asignatura que un docente imparte.</p>
                         <a href="estudiantes_x_asignaturas.php" target="_blank"class="btn btn-success"><i class="fa fa-eye"></i>  Ver Reporte</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-file-pdf-o fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Entrega de Tarea por Estudiantes</h4>
                        <p>Este reporte muestra las tareas que los estudiantes que me han enviado para calificar.</p>
                        <a href="entrega_tareas_estudiantes.php"target="_blank" class="btn btn-success"><i class="fa fa-eye"></i>  Ver Reporte</a>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-folder-open fa-stack-1x fa-inverse" style="color: #F8D20F"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Material Didáctico por docente</h4>
                        <p>Este reporte muestra los materiales que el docente utiliza para reforzamiento de los estudiantes.</p>
                         <a href="reportes/Mis_Materiales_Didacticos.php" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i>  Ver Reporte</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">                   
                              <i class="fa fa-square fa-stack-2x text-primary" style="color: #87A1BD"></i>
                              <i class="fa fa-book fa-stack-1x fa-inverse" style="color: #F8D20F"></i>                     
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Tareas Orientadas por Docente</h4>
                        <p>Este reporte muestra las tareas que el docente ha orientado a sus estudiantes por cada asignatura.</p>
                        <a href="reportes/Tareas_Orientadas_Por_Docentes.php"target="_blank" class="btn btn-success"><i class="fa fa-eye"></i>  Ver Reporte</a>
                    </div>
                </div>

               </div>
               </div>
 
            </div>
        
        </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

            

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
