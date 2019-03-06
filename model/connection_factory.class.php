<?php

class ConnectionFactory {
	
		function getConnection(){

		try {
			$host='localhost';//SERVIDOR
			$dbname='concesionarios';//BASE DE DATOS
			$user='root';//USUARIO
			$pass='123456';//CONTRASE�A

			$conexionbd= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			return $conexionbd;
			}
		
		catch (PDOException $e){
         	print "<p>Error: No puede conectarse con la base de datos.</p>\n";
			print "<p>Error: " . $e->getMessage() . "</p>\n";
        	exit();
			}
		}
		
		function closeConnection($conexionbd){

		$conexionbd=null;

		}
}

?>