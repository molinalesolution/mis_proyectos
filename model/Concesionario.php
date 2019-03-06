<?php
include_once('connection_factory.class.php');

	class Concesionario{
	
		function list_concesionario(){

   		    $conexion=ConnectionFactory::getConnection();
			$stmt = $conexion->prepare("select  
										c.ID,
										c.NOMBRE_CONCESIONARIO,
										e.ID as ID_ESTADO,
										e.TX_ESTADO
										from concesionarios.concesionario as c,concesionarios.estado e
										WHERE
										c.ID_ESTADO=e.ID");
			$stmt->execute();
			$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
            
	}
/*
$mensaje=new Cliente;
$resultado=$mensaje->search_cliente("10");
print'<pre>';
print_r($resultado);
*/
?>
