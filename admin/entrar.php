
<?php
		include('conexion.php');
	
			$username=htmlentities(mysql_real_escape_string($_POST['usuario']));
			$password=mysql_real_escape_string($_POST['password']);
			$tipo = $_POST['tipousuario'];
				
				$query = mysql_query($conexion,"SELECT Usuario,Clave, Roll FROM usuarios WHERE Usuario = '$username'") or die(mysql_error());
				$data = mysql_fetch_array($query);
			        if($data['Usuario'] != $username && ['Roll'] != $password)  {
						//echo "No a introducido una contrasenia correcta";
						echo '<script> alert("Datos Incorrectos.");</script>';
						header ("Location: ../login.php");
						exit();
		             }
		             else
		              {
			              	if ($tipo == "ventanilla") {
			              		echo '<script> alert("Bienvenido a la Pagina Principal.");</script>';
							    header ("Location: ../index.php");
			              	}
			              	elseif ($tipo == 2) {
			              		echo '<script> alert("Bienvenido a la Pagina de Docentes.");</script>';
							    header ("Location: ../admin/admin.php");
			              	}
			              	else{
			              		echo '<script> alert("Bienvenido a la Pagina de Estudiantes.");</script>';
							    header ("Location: ../admin/estudiantes.php");
			              	}
							
                      }
?> 