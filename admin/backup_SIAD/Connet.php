<?php
error_reporting(E_PARSE);
/*Solo modifica lo que se encuentra en medio de las segundas
 comillas de los parentesis. Ejemplo: define("USER", "valor que ingresaras" ); 
 */

//Nombre de usuario de mysql
define("USER", "root");

//Servidor de mysql
define("SERVER", "localhost");

//Nombre de la base de datos
define("BD", "paulofreire");

//Contraseña de myqsl
define("PASS", "");

//Carpeta donde se almacenaran las copias de seguridad
define("BACKUP_PATH", "backup/");

/*Configuración de zona horaria de tu país para más información visita
    http://php.net/manual/es/function.date-default-timezone-set.php
    http://php.net/manual/es/timezones.php
*/
date_default_timezone_set('America/ Mexico');


class SGBD{
    //Funcion para hacer consultas a la base de datos
    public static function sql($query){
        if(!$con=mysqli_connect(SERVER,USER,PASS,BD)){
            echo "Error en el servidor, verifique sus datos";
        }else{
            if (!mysqil_select_db(BD)) {
                echo "Error al conectar con la base de datos, verifique el nombre de la base de datos";
            }else{
                mysqli_set_charset('utf8',$con);
                mysqli_query("SET AUTOCOMMIT=0;",$con);
                mysqli_query("BEGIN;",$con);
                if (!$consul = mysqli_query($query,$con)) {
                    echo 'Error en la consulta SQL ejecutada';
                    mysqli_query("ROLLBACK;",$con);
                }else{
                    mysqli_query("COMMIT;",$con);
                }
                return $consul;
            }
        }
    }  

    //Funcion para limpiar variables que contengan inyeccion SQL
    public static function limpiarCadena($valor) {
        $valor=addslashes($valor);
        $valor = str_ireplace("<script>", "", $valor);
        $valor = str_ireplace("</script>", "", $valor);
        $valor = str_ireplace("SELECT * FROM", "", $valor);
        $valor = str_ireplace("DELETE FROM", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("INSERT INTO", "", $valor);
        $valor = str_ireplace("DROP TABLE", "", $valor);
        $valor = str_ireplace("TRUNCATE TABLE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        return $valor;
    }
}
