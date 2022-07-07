<?php
session_start();
include ('conexion.php');

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          

          $consulta4= "SELECT carreras.idCarrera as ID, carreras.NombreCarrera as Carrera FROM asignaturas 
  INNER JOIN carreras ON asignaturas.idCarrera = carreras.idCarrera"; 
          $carrera=mysqli_query($conexion, $consulta4);

          $consulta3= "select idNumeroAsignacion, numeroAsignado from numeros_asignaciones";
          $numeros=mysqli_query($conexion, $consulta3);

        $consulta5 = "SELECT idEstudiante, NombresEstudiante Nombre FROM estudiantes"; 
          $estudiante=mysqli_query($conexion, $consulta5);

          $consulta2= "SELECT idAsignatura, NombreAsignatura from asignaturas"; 
          $asignatura=mysqli_query($conexion, $consulta2);

          $consultaD=mysqli_query($conexion, "select Foto from usuarios where NivelUsuario= '1' AND Codigo = $codigo");                  
                while($filas=mysqli_fetch_array($consultaD)){
                         $foto=$filas['Foto'];                           
                 }

               

                 $consultaD2 = mysqli_query($conexion, "select concat (NombreUsuario) as usuarios from usuarios where idUsuario = $codigo"); 
                 while($filas2=mysqli_fetch_array($consultaD2)){
                         $usuario=$filas2['usuarios'];                           
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
    <title>Inscripciónae</title>
     <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="incripciones_asignaturas/myjava.js"></script>
    <script src="incripciones_asignaturas/functions.js"></script>

</head>
<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">

            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
            <div class="col-md-6">                

               <center><h2 style="color:black; font-family: gotic; " >ASIGNATURAS A ESTUDIANTES</h2>    </center> 

             </div>
               <div class="col-md-3">
               
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> <?php echo $user ?></h5>
               </div> 

            </div>
              <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Inscripciones Asignaturas</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
                        
            <div class="col-md-12">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Inscripción de Asignaturas</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
                       <div class="col-md-1"><h4>Buscar:</h4></div>
                       
                   <div class="col-md-5">
                          <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escriba el Codigo de la Inscripcion">
                       </div>
                        <div class="col-md-6">
                          <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nueva Inscripción</button> 
                       </div>
                  <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
            <center>
                <ul class="pagination" id="pagination"></ul>
            </center>
      </div>
      <div class="col-md-6">
           <center>
           <h4 style="font-weight: bold;"> 
    <?php
include('conexion.php');
    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM inscripciones_asignaturas"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#d9534f; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-align-justify'></i>&nbsp;&nbsp;Inscripción Asignatura</b></h4>
            </div>
             <center><p>Por favor introduzca los datos requeridos que están marcados por el signo  *</p></center>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-4 control-label">Proceso:</label>
                <div class="col-md-8"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
               </div> <br>
   
                     <div class="form-group"> <label for="carrera" class="col-md-4 control-label">*Carrera:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="carrera" name="carrera">
                     <?php 
                          while($fila=mysqli_fetch_row($carrera)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                      <div class="form-group"> <label for="carrera" class="col-md-4 control-label">*Estudiantes:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="estudiante" name="estudiante">
                     <?php 
                          while($fila=mysqli_fetch_row($estudiante)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>


                    <div class="form-group"> <label for="semestre" class="col-md-4 control-label">*Asignatura:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="asignatura" name="asignatura">
                     <?php 
                          while($fila=mysqli_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                    
                <div class="form-group"> <label for="carnet" class="col-md-4 control-label">*Observaciones:</label>
                     <div class="col-md-8">
                     <textarea name="observaciones" id="observaciones" required="true" class="form-control" rows="2"></textarea>
                     </div>
               </div> <br>
               <br>


              

                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
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
