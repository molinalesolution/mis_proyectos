<?php
include_once('connection_factory.class.php');

	class Cliente{

		function add_cliente($criterios){
		
		$conexion=ConnectionFactory::getConnection();
		$stmt = $conexion->prepare("insert into concesionarios.cliente
								   (NACIONALIDAD_CLIENTE,
									CEDULA_CLIENTE,
									NOMBRES_CLIENTE,
									APELLIDOS_CLIENTE,
									DIRECCION_CLIENTE,
									TELEFONO_CLIENTE,
									ID_CONCESIONARIO,
									ESTATUS_CLIENTE)
									values(?,?,?,?,?,?,?,1)");					

		$stmt->bindParam(1,  $criterios['nacionalidad']);//nacionalidad
		$stmt->bindParam(2,  $criterios['cedula']);//cedula
		$stmt->bindParam(3,  $criterios['nombres']);//nombres
		$stmt->bindParam(4,  $criterios['apellidos']);//apellidos
		$stmt->bindParam(5,  $criterios['direccion']);//direccion
		$stmt->bindParam(6,  $criterios['telefono']);//telefono
		$stmt->bindParam(7,  $criterios['id_concesionario']);//concesionario
		
		$valida_cedula=$this->validar_cliente($criterios['nacionalidad'],$criterios['cedula']);
		
			if ($valida_cedula > 0){
	
				$resultado=-6;//YA EXISTE LA CEDULA INGRESADA
			}
			else {
	
				$resultado=$stmt->execute();
			}
		return $resultado;//SI RESULTADO ES UNO REGISTRO EXITOSO

		}

		function update_cliente($criterios){

		print_r($criterios);
		
			$conexion=ConnectionFactory::getConnection();
			$stmt = $conexion->prepare("update concesionarios.cliente set
					NACIONALIDAD_CLIENTE=?,
					CEDULA_CLIENTE=?,
					NOMBRES_CLIENTE= ?,
					APELLIDOS_CLIENTE= ?,
					DIRECCION_CLIENTE= ?,
					TELEFONO_CLIENTE=?,
					ID_CONCESIONARIO=?
					where ID=?");
			
			$stmt->bindParam(1,  $criterios['nacionalidad']);
			$stmt->bindParam(2,  $criterios['cedula']);
			$stmt->bindParam(3,  $criterios['nombres']);
			$stmt->bindParam(4,  $criterios['apellidos']);
			$stmt->bindParam(5,  $criterios['direccion']);
			$stmt->bindParam(6,  $criterios['telefono']);
			$stmt->bindParam(7,  $criterios['id_concesionario']);
			$stmt->bindParam(8,  $criterios['id']);

			$resultado=$stmt->execute();
						
			return $resultado;
	     }
		 
		function delete_cliente($criterios){

			$conexion=ConnectionFactory::getConnection();
			$stmt = $conexion->prepare("update concesionarios.cliente set
					ESTATUS_CLIENTE=0 where id=?");
			
			$stmt->bindParam(1,$criterios['id']);

			$resultado=$stmt->execute();
			
			return $resultado;
	     }

		function search_cliente($criterios){
		
   		    $conexion=ConnectionFactory::getConnection();
			$stmt = $conexion->prepare("Select
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
									concesionarios.cliente cl,concesionarios.concesionario c
									where
									NACIONALIDAD_CLIENTE=?
									and 
									CEDULA_CLIENTE=?
									AND
									cl.ID_CONCESIONARIO=c.ID
									AND
									ESTATUS_CLIENTE=1");
			$stmt->bindParam(1, $criterios['nacionalidad']);
			$stmt->bindParam(2, $criterios['cedula']);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if ($result == null){
	
				$result=-1;//YA EXISTE LA CEDULA INGRESADA
			}
			
			return $result;
		}

		function validar_cliente($nacionalidad,$cedula){

				$conexion=ConnectionFactory::getConnection();
				$stmt = $conexion->prepare("Select count(*) as total from concesionarios.cliente where NACIONALIDAD_CLIENTE=? and CEDULA_CLIENTE=?");
				$stmt->bindParam(1, $nacionalidad);
				$stmt->bindParam(2, $cedula);
				$stmt->execute();
				$resultado=$stmt->fetch();
				$result=$resultado['total'];
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
