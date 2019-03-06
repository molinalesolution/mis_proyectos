<?php
include_once ('../model/Cliente.php');

 class ClienteController{

    function __construct() {
        $this->cliente = new Cliente();
    }

    function add_cliente($criterios) {
        $resultado = $this->cliente->add_cliente($criterios);
        return $resultado;
    }
	
	function update_cliente($criterios) {
        $resultado = $this->cliente->update_cliente($criterios);
        return $resultado;
    }
	
	function delete_cliente($criterios) {
        $resultado = $this->cliente->delete_cliente($criterios);
        return $resultado;
    }
	
    function search_cliente($criterios) {
        $resultado = $this->cliente->search_cliente($criterios);
        return $resultado;
    }

  }

/*$criterios=array();
$criterios['id']=7;//nacionalidad*/
/*
$criterios='10';
  
$a=new ClienteController();
$a=$a->search_cliente($criterios);
print "<pre>";
print_r($a);
*/
?>