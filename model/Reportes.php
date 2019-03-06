<?php
include_once('connection_factory.class.php');

	class Reportes{
	
		function search_reporte($criterios){

   		    $conexion=ConnectionFactory::getConnection();
			$stmt = $conexion->prepare("Select
									e.ID as ID_ESTADO,
									e.TX_ESTADO,
									c.ID as ID_CONCESIONARIO,
									c.NOMBRE_CONCESIONARIO,
									cl.ID AS ID_CLIENTE,
									cl.NACIONALIDAD_CLIENTE,
									cl.CEDULA_CLIENTE,
									cl.NOMBRES_CLIENTE,
									cl.APELLIDOS_CLIENTE,
									cl.DIRECCION_CLIENTE,
									cl.TELEFONO_CLIENTE,
									cl.ID_CONCESIONARIO,
									cl.ESTATUS_CLIENTE 
									from 
									concesionarios.cliente cl,concesionarios.concesionario c,concesionarios.estado e
									where
									cl.ID_CONCESIONARIO=c.ID
									AND
									c.ID_ESTADO=e.ID
									AND
									c.ID =$criterios");
			$stmt->bindParam(1, $criterios);
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
