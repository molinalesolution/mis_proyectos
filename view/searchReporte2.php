<?php
include_once ("../controller/ReporteController.php");

$obj = new ReporteController();

$parametro=trim($_REQUEST['txt_parametro']);

$resultado = $obj->search_reporte($parametro);

/*
print"<pre>";
print_r($resultado);
*/

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proyecto Concesionarios</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
         
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="">Concesionarios</a></h1>
        <div class="clear"></div>
    </div>
<?php 
include_once("menu.php");
?>
        <table class="tab_principal" border="0">
            <tr>
                <td>
                    <form name="frmReporte" id="frmReporte" method="post" action="procesarReporte.php">
                        <section aling="left">
                            <fieldset class="cuadroprincipal">
                                <legend>REPORTE POR CONCESIONARIO</legend>
                                <div>
                                    <table  align="center" border="2" cellpadding="0" cellspacing="0" width="1200px" height="100px" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
                                       <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="150px">
                                                <label for="estado" class="uname">&nbsp;&nbsp;&nbsp;Estado</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="concesionario" class="uname">&nbsp;&nbsp;&nbsp;Concesionario</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="nacionalidad" class="uname">&nbsp;&nbsp;&nbsp;Nacionalidad</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="cedula" class="uname">&nbsp;&nbsp;&nbsp;Cedula</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="nombre" class="uname">&nbsp;&nbsp;&nbsp;Nombres</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="apellidos" class="uname">&nbsp;&nbsp;&nbsp;Apellidos</label>
                                            </td>
										    <td style="text-align: left;" width="150px">
                                                <label for="direccion" class="uname">&nbsp;&nbsp;&nbsp;Direccion</label>
                                            </td>
											<td style="text-align: left;" width="150px">
                                                <label for="telefonos" class="uname">&nbsp;&nbsp;&nbsp;Telefonos</label>
                                            </td>
                                        </tr>
										<?php foreach($resultado as $result){?>
                                       <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['TX_ESTADO'];?>
                                            </td>
                                            <td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['NOMBRE_CONCESIONARIO'];?>
                                            </td>
											<td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['NACIONALIDAD_CLIENTE'];?>
                                            </td>
                                            <td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['CEDULA_CLIENTE'];?>
                                            </td>
											<td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['NOMBRES_CLIENTE'];?>
                                            </td>
                                            <td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['APELLIDOS_CLIENTE'];?>
                                            </td>
											<td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['DIRECCION_CLIENTE'];?>
                                            </td>
                                            <td style="text-align: left;font-size:80%;">&nbsp;
											<?php echo $result['TELEFONO_CLIENTE'];?>
                                            </td>
                                        </tr>
										<?php }?>										
                                    </table>
                                    <table  align="center" border="0" cellpadding="0" cellspacing="0" width="500px">
                                        <tr>
                                            <td style="height: 60px" colspan="2" align="center">&nbsp;
											<a href="reporte.php?txt_id_concesionario=<?php echo $result['ID_CONCESIONARIO'] ?>" target="_blank">EXPORTAR PDF</a>
											<input id="txt_id_concesionario" name="txt_id_concesionario" type="hidden" size="40" maxlength="20" value="<?php echo $result['ID_CONCESIONARIO'] ?>" />
                                            </td>
                                        </tr>

                                    </table>
                            </fieldset>
                        </section>          
                    </form>
                </td>
            </tr>
        </table>
</div>
</body>
</html>