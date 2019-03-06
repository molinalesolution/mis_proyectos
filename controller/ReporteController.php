<?php
include_once ('../model/Reportes.php');

 class ReporteController{

    function __construct() {
        $this->reporte = new Reportes();
    }

    function search_reporte($criterios) {
        $resultado = $this->reporte->search_reporte($criterios);
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