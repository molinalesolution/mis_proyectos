<?php
include_once ('../model/Concesionario.php');

 class ConcesionarioController{

    function __construct() {
        $this->concesionario = new Concesionario();
    }

    function list_concesionario() {
        $resultado = $this->concesionario->list_concesionario();
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