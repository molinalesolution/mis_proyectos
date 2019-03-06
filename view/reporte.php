<?php
define('FPDF_FONTPATH','fpdf/font/');
require('fpdf/fpdf.php');
include_once ("../controller/ReporteController.php");


/*
print"<pre>";
print_r($resultado);
exit();
*/
class PDF extends FPDF
{

function PDF()
{
	$this->FPDF('L','mm','letter');
}


function cuerpo(){
	
	//SUBTITULOS DE LOS REPORTES LOS CUALES DE HABILITAN DEPENDIENDO DE LA CONSULTA
	$this->SetFont('Arial','B',8);
	$this->Cell(30,10,'ESTADO',1,0,'C');
	$this->Cell(40,10,'CONCESIONARIO',1,0,'C');
	$this->Cell(25,10,'NACIONALIDAD',1,0,'C');
	$this->Cell(25,10,'CEDULA',1,0,'C');
	$this->Cell(30,10,'NOMBRES',1,0,'C');
	$this->Cell(30,10,'APELLIDOS',1,0,'C');
	$this->Cell(50,10,'DIRECCION',1,0,'C');
	$this->Cell(30,10,'TELEFONO',1,0,'C');
	$this->Ln();
	
	$obj = new ReporteController();
    $parametro=trim($_REQUEST['txt_id_concesionario']);
    $resultado = $obj->search_reporte($parametro);
	//print'<pre>';
	//print_r($resultado);
	
	foreach($resultado as $result){
	
	$this->SetFont('Arial','',8);
	$this->Cell(30,8,$result['TX_ESTADO'],1,0,'C');
	$this->Cell(40,8,$result['NOMBRE_CONCESIONARIO'],1,0,'C');
	$this->Cell(25,8,$result['NACIONALIDAD_CLIENTE'],1,0,'C');
	$this->Cell(25,8,$result['CEDULA_CLIENTE'],1,0,'C');
	$this->Cell(30,8,$result['NOMBRES_CLIENTE'],1,0,'C');
	$this->Cell(30,8,$result['APELLIDOS_CLIENTE'],1,0,'C');
	$this->Cell(50,8,$result['DIRECCION_CLIENTE'],1,0,'C');
	$this->Cell(30,8,$result['TELEFONO_CLIENTE'],1,0,'C');
	$this->Ln();
	
	}

}
}
//METODO NECESARIO PARA QUE SE HABRA EL PDF CUANDO SE LLAME LA PAG.
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();
$pdf->cuerpo();
$pdf->Output();
?>