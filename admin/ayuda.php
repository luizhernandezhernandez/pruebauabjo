<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
              $codigo = $_SESSION["Codigo"];

              $consulta1=mysqli_query($conexion, "select Foto from usuarios where NivelUsuario= '1' AND Codigo = $codigo");                  
                while($filas=mysqli_fetch_array($consulta1)){
                         $foto=$filas['Foto'];                           
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

    <title>Ayuda</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       <link rel="shortcut icon" href="../imagenes/paulo.png" type="image/x-icon">

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>

<body>


<?php
        include ('menuAdmin.php');
            ?>
    <!-- Page Content -->
    <br>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
      <div class="row">
        <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/paulo2.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
          <center><h2 style="color:black; font-family: gotic; " >MANUAL DE USUARIOS </h2></center>
                     
             </div>
               <div class="col-md-3">
              <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; En línea:</b> <?php echo $user ?></h5>
               </div> 

            </div>
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../../index.html">Inicio</a>
                    </li>
                    <li><a href="admin.php">Adminstrador</a> </li>
                    <li class="active">Ayuda</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

           <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Manual de Usuario</b></h4></center>
        </div>
        <center>
    <span class="fa-stack fa-3x">
            <i class="fa fa-square fa-stack-2x text-primary"style="color:#87A1BD"></i>
            <i class="fa fa-file-text fa-stack-1x fa-inverse"style="font-size:50px;color:#F8D20F;"></i>
        </span>
   
   <br><br>
   <form action="ayuda/help.php" method="post">
       <input type="submit" name="" value="Ver Manual" class="btn btn-primary">
   </form>
        </div> </center>
        <br><br><br><br><br><br>
        <!-- /.row -->

        
        <!-- /.row -->

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
