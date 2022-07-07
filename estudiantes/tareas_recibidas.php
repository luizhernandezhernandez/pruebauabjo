<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta1="select idNumeroAsignacion, numeroAsignado FROM numeros_asignaciones";
          $numero=mysqli_query($conexion,$consulta1);

           $consulta=mysqli_query($conexion,"select Foto from estudiantes where idEstudiante = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysqli_query($conexion,"select concat (NombresEstudiante, ' ', ApellidosEstudiante) as Estudiante from estudiantes where idEstudiante = $codigo"); 
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
    <title>Tareasrecibidas</title>
     <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="tareas_recibidas/myjava.js"></script>

</head>
<body>
           <?php
        include ('menu_inicio_estudiante.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
                       <div class="col-md-6">


                        <center><h2 style="color:black; font-family: gotic; " >MIS TAREAS</h2></center>

                          
                       </div>
               <div class="col-md-3">
                <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> <?php echo $estudiante ?></h5>
               </div> 
            </div>
            <div class="col-lg-12">              
                <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="estudiantes.php">Estudiantes</a></li>
                    <li class="active">Tareas Recibidas</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->

            <!-- Content Column -->
              <?php
    include('menu_estudiante.php');
 ?>

            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b> <i class="glyphicon glyphicon-list-alt"></i> &nbsp; Mis Tareas Recibidas</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                  <!--Fin del Segundo Row !-->
                   <center>
		               <div class="col-md-4"><h4>Buscar Tarea:</h4></div>
		               
                   <div class="col-md-5">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escribe el Código de la Tarea">
		               </div>
	              <br>
            <br>
            <br>
            </center> 
    <div class="registros" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      </div>                   
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
</div>
        <hr>

    </div>
        
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
