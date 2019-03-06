<?php
include_once ("../controller/ClienteController.php");

$obj = new ClienteController();

$arrayCliente=array();
$arrayCliente['nacionalidad'] = trim($_REQUEST['txt_nacionalidad']);
$arrayCliente['cedula'] = trim($_REQUEST['txt_cedula']);

$resultado = $obj->search_cliente($arrayCliente);

print"<pre>";
print_r($resultado);


?>
<script>
 function modificar(){
        document.frmCliente.action="procesarCliente.php?parametro=2";
        document.frmCliente.submit();
        }
		
function eliminar(){
        document.frmCliente.action="procesarCliente.php?parametro=3";
        document.frmCliente.submit();
        }
		
</script>

<html>
    <head>
    </head>
    <body>
        <table class="tab_principal" border="0">
            <tr>
                <td>
                    <form name="frmCliente" id="frmCliente" method="post" action="procesarCliente.php">
                        <section aling="left">
                            <fieldset class="cuadroprincipal">
                                <legend>Modificacion Clientes</legend>
                                <div>
                                    <table  align="center" border="2" cellpadding="0" cellspacing="0" width="550px" height="500px" style=" border-radius: 5px; border:1px solid #93B8BD;-webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;">
                                       <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="idCliente" class="uname">&nbsp;&nbsp;&nbsp;Id Cliente</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_id_cliente" name="txt_id_cliente"  type="text" size="1" maxlength="1" value="<?php echo $resultado['ID_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
										<tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="Nacionalidad" class="uname">&nbsp;&nbsp;&nbsp;Nacionalidad</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_nacionalidad" name="txt_nacionalidad"  title="Escriba la nacionalidad del Cliente" type="text" size="1" maxlength="1" value="<?php echo $resultado['NACIONALIDAD_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="Cedula" class="uname">&nbsp;&nbsp;&nbsp;Cédula</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_cedula" name="txt_cedula"  title="Escriba la cedula del Cliente" type="text" size="10" maxlength="10" value="<?php echo $resultado['CEDULA_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="nombre" class="uname">&nbsp;&nbsp;&nbsp;Nombres</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_nombres" name="txt_nombres" title="Escriba los nombres del Cliente" type="text" size="40" maxlength="20" value="<?php echo $resultado['NOMBRES_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="apellidos" class="uname">&nbsp;&nbsp;&nbsp;Apellidos</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_apellidos" name="txt_apellidos" title="Escriba los apellidos del Cliente" type="text" size="40" maxlength="20" value="<?php echo $resultado['APELLIDOS_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="direccion" class="uname">&nbsp;&nbsp;&nbsp;Direccion</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
											<textarea name="txt_direccion" rows="5" cols="40" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"><?php echo $resultado['DIRECCION_CLIENTE'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="telefonos" class="uname">&nbsp;&nbsp;&nbsp;Telefonos</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_telefono" name="txt_telefono" title="Escriba el telefono del Cliente" type="text" size="40" maxlength="20" value="<?php echo $resultado['TELEFONO_CLIENTE'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #F7F7F7">
                                            <td style="text-align: left;" width="30%">
                                                <label for="concesionario" class="uname">&nbsp;&nbsp;&nbsp;Concesionario</label>
                                            </td>
                                            <td style="text-align: left;">&nbsp;
                                                <input id="txt_concesionario" name="txt_concesionario" title="Escriba el concesionario asociado al cliente" type="text" size="40" maxlength="20" value="<?php echo $resultado['NOMBRE_CONCESIONARIO'] ?>" style="padding: 6px 5px 5px 32px; border: 1px solid rgba(147, 184, 189,0.8); -webkit-box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;border-radius: 3px;"/>
                                            </td>
                                        </tr>											
                                    </table>
                                    <table  align="center" border="0" cellpadding="0" cellspacing="0" width="500px">
                                        <tr>
                                            <td style="height: 60px" colspan="2">&nbsp;
											<input type="button" value="modificar" onclick="javascript:modificar()" />
											<input type="button" value="eliminar" onclick="javascript:eliminar()" />
											
											<input id="txt_id_concesionario" name="txt_id_concesionario" type="hidden" size="40" maxlength="20" value="<?php echo $resultado['ID_CONCESIONARIO'] ?>" />
                                            </td>
                                        </tr>

                                    </table>
                            </fieldset>
                        </section>          
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>