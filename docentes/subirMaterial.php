

<?php
include '../admin/conexion.php';
session_start();
if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION['Codigo'];
        ?>
           <?php 
          $consulta1="SELECT numeros_asignaciones.idNumeroAsignacion, numeros_asignaciones.numeroAsignado, docentes.idDocente FROM numeros_asignaciones INNER JOIN docentes ON numeros_asignaciones.idDocente = docentes.idDocente where numeros_asignaciones.idDocente='$codigo'";
          $numero=mysqli_query($conexion, $consulta1);

                       $consultaD=mysqli_query($conexion, "select Foto from docentes where idDocente = $codigo");                  
                while($filas=mysqli_fetch_array($consultaD)){
                         $foto=$filas['Foto'];                           
                 }

                 $consultaD2 = mysqli_query($conexion, "select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysqli_fetch_array($consultaD2)){
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
    <title>Subir material </title>
     <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" href="../alertas/sweetalert.css">
  <script src="../alertas/sweetalert.min.js"></script>
</head>
<body>
           <?php
       include ('menu_inicio_docente.php');
            ?>
       
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <center><h2 style="color:black; font-family: gotic; " >SUBIR MATERIAL </h2></center>
                     
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
                    <li><a href="material_didactico.php">Material Didáctico</a></li>
                    <li class="active">Subir Material</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
              <?php
    include('menu_docente.php');
 ?>

    <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Administración de Material Didáctico</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                  <form id="formulario" class="form-group" action="material_didactico/recibirSubida.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
   <center><p>Por favor introduzca los datos requeridos que están marcados por el signo  *</p></center>
           <br>

          <div class="form-group"> <label for="carnet" class="col-md-3 control-label">*Número de Asignación:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="numero" name="numero">
                     <?php 
                          while($fila=mysqli_fetch_row($numero)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Descripción:</label>
        <div class="col-md-9"><textarea class="form-control" id="descripcion" name="descripcion" maxlength="200"></textarea>
                </div>
         </div> <br>


               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">*Archivo:</label>
        <div class="col-md-9"><input type="file" class="form-control" id="archivo" name="archivo" required="true"></div>
         </div> <br> 

<br>
                
               <center><input type="submit" value="Registrar" name="subir" class="btn btn-success" id="reg"/></center>    
          
             </div>         
              <div id="mensaje"> </div>

            </form>
                       <a href="material_didactico.php"> <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a>        

                            </div>
                        </div>
                         <!-- Fin del Row -->       
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
