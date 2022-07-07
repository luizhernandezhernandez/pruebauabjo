<?php
include_once '../../admin/conexion.php';
include_once 'funciones.php';
session_start();
 $codigo = $_SESSION["Codigo"];

if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $nombre_sin_acentos = limpiar_acentos($nombre);
    $destino = "pdf/archivos/" . $nombre_sin_acentos;
    $fecha = date("Y-m-d");


        if ($nombre != "") {
         if ($tamanio <= 1000 * 10000 ) { //validando que el archivo sea menor o igual a 10 MB
                 if (($tipo == "application/pdf") || ($tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") || ($tipo == "application/msword")) {       //validando que el archivo sea de tipo PDF y WORD (.docx, .doc)          
                   if (copy($ruta, $destino)) {
                                $numero= $_POST['numero'];
                                $descripcion= $_POST['descripcion'];
                                $tarea = mt_rand(99,999999);
                                $sql = "INSERT INTO material_didactico (Descripcion, Archivo,CodigoMaterial,Fecha_subida,idNumeroAsignacion, idDocente) VALUES('$descripcion','$nombre_sin_acentos','$tarea','$fecha','$numero','$codigo')";
                    $query = mysqli_query($conexion,$sql);
                        if($query){
                                echo '<script> alert("El Libro PDF se ha subido al servidor con Exito.");</script>';
                                echo '<script> alert("El Codigo de su Material es : ' .$tarea.'");</script>';
                                echo '<script> window.location="../subirMaterial.php"; </script>';
                          }
                } else {
                        echo '<script> alert("Error al subir el Material.");</script>';
                }

            }
           else{
                             echo '<script> alert("Solo se permiten archivos PDF y WORD.");</script>';
                             echo '<script> window.location="../subirMaterial.php"; </script>';
           }  
         }
         else{
                    echo '<script> alert("El Archivo es muy Grande.");</script>';
                    echo '<script> window.location="../subirMaterial.php"; </script>';
         }
    }
}

?>