<?php
class dbConecta{


	//private $conexion;

    public static function conexion(){

		$server = "127.0.0.1";
		$database = "gascontrol";
		$user = "root";
		$password = "abc123";

        //$conexion=new mysqli($this->server, $this->user, $this->password, $this->database);
        $conexion=new mysqli($server, $user, $password, $database);
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }

    public static function get_array($sql){

    	$mysqli = new mysqli('127.0.0.1', 'root', 'abc123', 'gascontrol');

    	if($mysqli->connect_errno) {
		    // La conexión falló. ¿Que vamos a hacer? 
		    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
		    // No se debe revelar información delicada

		    // Probemos esto:
		    echo "Lo sentimos, este sitio web está experimentando problemas.";

		    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
		    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
		    echo "Error: Fallo al conectarse a MySQL debido a: \n";
		    echo "Errno: " . $mysqli->connect_errno . "\n";
		    echo "Error: " . $mysqli->connect_error . "\n";
		    
		    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
		    exit;
		}

		// Realizar una consulta SQL
		if (!$resultado = $mysqli->query($sql)) {
		    // ¡Oh, no! La consulta falló. 
		    echo "Lo sentimos, este sitio web está experimentando problemas.";

		    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
		    // cómo obtener información del error
		    echo "Error: La ejecución de la consulta falló debido a: \n";
		    echo "Query: " . $sql . "\n";
		    echo "Errno: " . $mysqli->errno . "\n";
		    echo "Error: " . $mysqli->error . "\n";
		    exit;
		}


		$datos = array();
		while ($dato = $resultado->fetch_assoc()) {
		    //echo $dato[0];
		    $datos[] = $dato;
		}
		//var_dump($datos);

		// El script automáticamente liberará el resultado y cerrará la conexión
		// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
		$resultado->free();
		$mysqli->close();

		return $datos;

    }

    public static function get_row($sql){
    	$datos = dbConecta::get_array($sql);
		if(count($datos)>0){
			$datos = $datos[0];
		}else $datos = null;

		return $datos;
    }


    public static function execute($array_querys){
		
		$result = 0;
    	$mysqli = new mysqli('127.0.0.1', 'root', 'abc123', 'gascontrol');

		if ($mysqli->connect_errno) {
		    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		/* Recomendado: usar la API para cotrolar las configuraciones transaccionales */
		$mysqli->autocommit(false);

		try {

			$result_query = false;
			foreach ($array_querys as $query) {
				$result_query = $mysqli->query($query);

				if(!$result_query){
					$result = mysql_error();
					break;
				}
			}

			if($result_query){
				$mysqli->commit();
				$result = 1;
			}else{
				$mysqli->rollback();
			}
			
		} catch (Exception $e) {
			$mysqli->rollback();
			$result = 'Excepción capturada: ' .  $e->getMessage();
		} 

		$mysqli->autocommit(true);
		$mysqli->close();

		return $result;
    }

    

}
?>