<?php
include_once("../controller/ConcesionarioController.php");
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
<script>
 function enviar(){
 
 		if($("#txt_parametro").val().trim()==""){
			alert("DEBE COLOCAR UN PARAMETRO PARA CONSULTAR");
			return false;
		}
		
        document.frmCliente.action="searchReporte2.php";
        document.frmCliente.submit();
        }
</script>
</head>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="">Concesionarios</a></h1>
        <div class="clear"></div>
    </div>
<?php 
include_once("menu.php");

$obj = new ConcesionarioController();
$resultado2 = $obj->list_concesionario();
?>
        <table class="tab_principal" border="0">
            <tr>
                <td>
                    <form name="frmCliente" id="frmCliente" method="post" action="">
                        <section aling="left">
                            <fieldset class="cuadroprincipal">
                                <legend>REPORTE</legend>
                                <div>
                                    <table  align="center" border="2" cellpadding="0" cellspacing="0" width="600px" height="100px" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="Parametro" class="uname">&nbsp;&nbsp;&nbsp;Búsqueda por Concesionario</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
											<select name="txt_parametro" id="txt_parametro" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
												<?php
												foreach($resultado2 as $result){
												$selected="";
												if($result['ID']==$resultado['ID_CONCESIONARIO']){
												$selected='selected';
												}
												?>
												<option value="<?php echo $result['ID'] ?>" <?php echo $selected ?> ><?php echo $result['ID']."-".$result['NOMBRE_CONCESIONARIO'].' ('.$result['TX_ESTADO'].')'?></option>
												<?php }?>												
											</select>
                                            </td>
                                        </tr>
									
                                    </table>
                                    <table  align="center" border="0" cellpadding="0" cellspacing="0" width="500px">
                                        <tr>
                                            <td style="height: 60px" colspan="2" align="center">&nbsp;
											<input type="button" value="CONSULTAR" onclick="javascript:enviar()" />
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
