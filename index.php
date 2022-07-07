<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SAPF</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="../images/paulo.jpeg" type="image/x-icon">
</head>

<body>

<?php include('includes/menuPublico.php') ?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('../images/slider-03.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../images/slider-01.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../images/blog_single.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../images/img2.jpg');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <center>
                        SISTEMA ADMINISTRATIVO PAULO FREIRE
                    </center> 
                     
                </h1>
            </div>
            <div class="col-lg-12">
                <p>
                    <center>
                        <b>
                            Bienvenidos al Sistema de Información Administrativo
                        </b>
                        
                    </center>
                     
                <p>
                <br>


                
                             
            </div>
            
                
            
             <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/docentes2.png">
                    </div>
                    <div class="panel-body">
                        <h4>Docentes</h4>
                        <p></p>
                        <a href="docentes/docentes.php" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Entrar</a>
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/estudiante2.png">
                    </div>
                    <div class="panel-body">
                        <h4>Estudiantes</h4>
                        <p></p>
                        <a href="estudiantes/estudiantes.php" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/admi2.png">
                    </div>
                    <div class="panel-body">
                        <h4>Administradores</h4>
                        <p></p>
                        <a href="admin/admin.php" class="btn btn-primary"> <i class="glyphicon glyphicon-log-in"></i> Entrar</a>
                    </div>
                </div>
            </div>          
        </div>
        </div>
         
        <!-- /.row -->
        <!-- Features Section -->
        
   <hr>
    </div>
    <script src="js/jquery.js"></script>
     <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    


</body>

</html>
