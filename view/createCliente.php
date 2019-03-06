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
<script type="text/javascript" src="js/jquery.numeric.js"></script>
</head>

<script>
 function enviar(){
 
		if($("#txt_cedula").val().trim()==""){
			alert("DEBE COLOCAR UNA CÉDULA");
			return false;
		}
		if($("#txt_nombres").val().trim()==""){
			alert("DEBE COLOCAR UN NOMBRE");
			return false;
		}
		if($("#txt_apellidos").val().trim()==""){
			alert("DEBE COLOCAR UN APELLIDO");
			return false;
		}
		if($("#txt_direccion").val().trim()==""){
			alert("DEBE COLOCAR LA DIRECCION");
			return false;
		}
		if($("#txt_telefono").val().trim()==""){
			alert("DEBE COLOCAR UN TELEFONO");
			return false;
		}

        document.frmCliente.action="procesarCliente.php";
        document.frmCliente.submit();
		
        }

		$(document).ready(function(){
			$('#txt_cedula').numeric();
			$('#txt_telefono').numeric();
		});		
		
</script>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">Concesionarios</a></h1>
        <div class="clear"></div>
    </div>
<?php 

include_once("menu.php");
include_once("../controller/ConcesionarioController.php");

$obj = new ConcesionarioController();
$resultado = $obj->list_concesionario();
/*
print'<pre>';
print_r($resultado);
*/
$msg="";
if(isset($_REQUEST['parametro'])&& $_REQUEST['parametro']==-6){
$msg="REGISTRO DUPLICADO";
}
else if(isset($_REQUEST['parametro'])&& $_REQUEST['parametro']==1){
$msg="REGISTRO EXITOSO";
}

?>



	
<table class="tab_principal" border="0">
			<tr>
			<td align="center"><div><?php echo $msg ?></div></td>
			</tr>
            <tr>
                <td>
                    <form name="frmCliente" id="frmCliente" method="post" action="procesarCliente.php">
                        <section aling="left">
                            <fieldset class="cuadroprincipal">
                                <legend>AGREGAR CLIENTES</legend>
                                <div>
                                    <table  align="center" border="2" cellpadding="0" cellspacing="0" width="500px" height="100px" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="Nacionalidad" class="uname">&nbsp;&nbsp;&nbsp;Nacionalidad</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
												<select name="txt_nacionalidad" id="txt_nacionalidad" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
												<option value="V">V</option>
												<option value="E">E</option>
												</select>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="Cedula" class="uname">&nbsp;&nbsp;&nbsp;Cédula</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_cedula" name="txt_cedula"  title="Escriba la cedula del Cliente" type="text" size="10" maxlength="10" value="" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="nombre" class="uname">&nbsp;&nbsp;&nbsp;Nombres</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_nombres" name="txt_nombres" title="Escriba los nombres del Cliente" type="text" size="40" maxlength="20" value="" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="apellidos" class="uname">&nbsp;&nbsp;&nbsp;Apellidos</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_apellidos" name="txt_apellidos" title="Escriba los apellidos del Cliente" type="text" size="40" maxlength="20" value="" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="direccion" class="uname">&nbsp;&nbsp;&nbsp;Direccion</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
											<textarea name="txt_direccion" id="txt_direccion" rows="3" cols="40" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"></textarea>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="telefonos" class="uname">&nbsp;&nbsp;&nbsp;Telefonos</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_telefono" name="txt_telefono" title="Escriba el telefono del Cliente" type="text" size="40" maxlength="20" value="" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="concesionario" class="uname">&nbsp;&nbsp;&nbsp;Concesionario</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
												<select name="txt_id_concesionario" id="txt_id_concesionario" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
												<?php  foreach($resultado as $result) {?>
												<option value="<?php echo $result['ID'] ?>"><?php echo $result['NOMBRE_CONCESIONARIO'].' ('.$result['TX_ESTADO'].')'?></option>
												<?php }?>												
												</select>
                                            </td>
                                        </tr> 										
                                    </table>
                                    <table  align="center" border="0 cellpadding="0" cellspacing="0" width="500px">
                                        <tr>
                                            <td colspan="2" align="center">&nbsp;
											<input type="button" value="AGREGAR" onclick="javascript:enviar()" />
											<input id="parametro" name="parametro" type="hidden" value="1"/>
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

