<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
           $consulta1="SELECT asignaturas.idAsignatura, asignaturas.NombreAsignatura FROM inscripciones_asignaturas INNER JOIN asignaturas ON inscripciones_asignaturas.idAsignatura = asignaturas.idAsignatura where inscripciones_asignaturas.idEstudiante = '$codigo'";
          $asignatura=mysqli_query($conexion,$consulta1);


           $consulta1="select idNumeroAsignacion, numeroAsignado FROM numeros_asignaciones";
          $numero=mysqli_query($conexion,$consulta1);
          

               $consulta=mysqli_query($conexion,"select Foto from docentes where idDocente = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysqli_query($conexion,"select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $docente=$filas2['Docente'];                           
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
    <title>Material didáctico</title>
     <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="material_didactico/myjava.js"></script>

</head>
<body>
           <?php
          include ('menu_inicio_docente.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
                       <div class="col-md-6">   

                         <center>  <h2 style="color:black; font-family: gotic; " >MATERIAL DIDÁCTICO </h2></center>

                       </div>
               <div class="col-md-3">
              <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> <?php echo $docente ?></h5>
               </div> 
            </div>
            <div class="col-lg-12">              
               <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                    <li class="active">Material didáctico</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->

            <!-- Content Column -->
              <?php
    include ('menu_docente.php');
 ?>

            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Material Didáctico</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                  <!--Fin del Segundo Row !-->

		               <div class="col-md-3"><h4>Buscar Material:</h4></div>
		               
                   <div class="col-md-4">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Buscar">
		               </div>
		               	<div class="col-md-5">
                      <a href="subirMaterial.php"><button class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nuevo Material </button></a>
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
          include('../admin/conexion.php');
          $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM material_didactico where idDocente = $codigo"));
          echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
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
