<?php

include_once ("../controller/ClienteController.php");

$obj = new ClienteController();

$arrayCliente=array();
$arrayCliente['nacionalidad'] = trim($_REQUEST['txt_nacionalidad']);
$arrayCliente['cedula'] = trim($_REQUEST['txt_cedula']);
$arrayCliente['nombres'] = trim($_REQUEST['txt_nombres']);
$arrayCliente['apellidos'] = trim($_REQUEST['txt_apellidos']);
$arrayCliente['direccion'] = trim($_REQUEST['txt_direccion']);
$arrayCliente['telefono'] = trim($_REQUEST['txt_telefono']);
$arrayCliente['id_concesionario'] = trim($_REQUEST['txt_id_concesionario']);
$arrayCliente['id'] = trim($_REQUEST['txt_id_cliente']);


print_r($arrayCliente);


//$_REQUEST['parametro']=3;

if ((isset($_REQUEST['parametro'])) && ($_REQUEST['parametro'] == 1)) {
    
    $resultado = $obj->add_cliente($arrayCliente);
	header("location:createCliente.php?parametro=$resultado"); 

} if ((isset($_REQUEST['parametro'])) && ($_REQUEST['parametro'] == 2)) {

    $resultado = $obj->update_cliente($arrayCliente);
	header("location:searchCliente.php?parametro=$resultado"); 
    
} if ((isset($_REQUEST['parametro'])) && ($_REQUEST['parametro'] == 3)) {

    $resultado = $obj->delete_cliente($arrayCliente);
}


echo $resultado;
