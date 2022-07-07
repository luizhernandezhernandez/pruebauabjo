<?php session_start(); ?>

		<?php
			include '../admin/conexion.php';
			if(isset($_POST['usuario'])){
				
				$usuario = $_POST['usuario'];
				$pw = $_POST['password'];

			//	$numero = srand((double)microtime()*1000000);

				$log = mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='$usuario' AND Clave='$pw'");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);

					$_SESSION["Usuario"] = $row['Usuario']; 
				  	$_SESSION["Clave"] = $row['Clave']; 
				  	$_SESSION["Codigo"] = $row['Codigo']; 
				  	if ($_SESSION["Clave"] == "ventanilla") {
				  		echo '<script> window.location="../admin/admin.php"; </script>';
				  	}
					  	  elseif ($_SESSION["NivelUsuario"] == 2) {
					  	 	echo '<script> window.location="../docentes/docentes.php"; </script>';
					  	 }

							 else {
						  	 	echo '<script> window.location="../estudiantes/estudiantes.php"; </script>';
						  	 	echo $numero;
						  	 }
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos. ");</script>';
					echo '<script> window.location="../login.php"; </script>';
				}
			}
		?>	
