<?php
session_start();
require "DAOMensajero.php";
require "DAOHorario.php";
require "DAOServicio.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ConsultaMensajeros</title>
<style type="text/css">
.botones {
	display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}
	.tipoDoc{
		width: 100%;
        padding: 10px;
        border: 1px solid #E78767;
        border-radius: 4px;
        font-size: 16px;
        margin-bottom: 10px;
		
	}
	.tipoDocFechaHora{
		width: 60%;
        padding: 2px;
        border: 1px solid #E78767;
        border-radius: 4px;
        font-size: 16px;
        margin-bottom: 10px;
		
	}
	.tipoCampos{
		width: 90%;
        padding: 2px;
        border: 1px solid #E78767;
        border-radius: 4px;
        font-size: 16px;
        margin-bottom: 10px;
		
	}
	.tablaSer{
  border: #4A91AF 2px solid;
}
.encabezadoTR{
  border: #4A91AF 2px solid;
  background-color: lightblue;
}
.encabezadoTD{
  padding-left: 2%; 
  width: 1%; 
  border: #4A91AF 2px solid;
}
.RegTD{
  padding-left: 1%; 
  border: #4A91AF 2px solid;
}
.titulo {
	color: #f9423a;
	font-family: 'Ubuntu', sans-serif;
  	font-size: 3rem;
	padding: 20px;
  	background-color: #ECB48F;
}
.parrafoIzq {
	font-family: 'Ubuntu', sans-serif;
  	font-size: 1.4rem;
	padding-top: 30px;
	padding-left: 70px;
	
}
.imgIni {
	align-items: center;
	padding-top: 30px;
	padding-left: 60px;
	
}
.solicitud {
	align-items: center;
	horizontal-align: center;
	padding-left: 43%;
	padding-top: 5%;
}
.idaVuelta{
	padding-left:50%;
	font-size: 1.4rem;
}
.textoFH{	
}
.encabezado{
	padding-left:3%;
	width: 5%;
}
.encabeza2{
	padding-left:3%;
	width: 10%;
}
.textoP{
	padding-left:3%;
	width: 10%;
}
.textoBarra{
	padding-left:3%;
	width: 100%;
}
.centrar{
	align-content: center;
	align-items: center;
	align-self: center;
	padding-left:100%;
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
<?php
	$daom = new DAOMensajero();
	function cargar(){
		$s_social="false";
		if(isset($_POST["cotizante"])){
			$s_social = "true";
		}
		
		$mensajero = new Mensajero();
		$mensajero->set_k_idMensajero($_REQUEST["numDocumento"]);
		$mensajero->set_n_tipoServicio($_REQUEST["tipoDoc"]);
		$mensajero->set_i_vehiculo($_REQUEST["tipo_vehiculo"]);
		$mensajero->set_i_seguridadSocial($s_social);
		$mensajero->set_n_correo($_REQUEST["correo"]);
		$mensajero->set_k_tipoDocumento($_REQUEST["tipo_documento"]);
		$mensajero->set_n_nacionalidad($_REQUEST["nacionalidad"]);
		$mensajero->set_f_fechaNacimiento($_REQUEST["fecha"]);
		$mensajero->set_q_telefono($_REQUEST["tel"]);
		$mensajero->set_i_sexo($_REQUEST["sexo"]);

		return $mensajero;
	}

	$daoh = new DAOHorario();

	function cargarH(){

		$horario = new Horario();

		$horario->set_k_idMensajero($_REQUEST["numDocumento"]);
		$horario->set_k_tipoDocumento($_REQUEST["tipo_documento"]);
		$horario->set_n_dia($_REQUEST["dia"]);
		$horario->set_h_horaInicio($_REQUEST["horaI"]);
		$horario->set_h_horaFinal($_REQUEST["horaF"]);

		return $horario;
		
	}
	if(isset($_POST["crear"])){
		$daoh->insertar(cargarH());
		$daom->insertar(cargar());
		
		//header("Location: ./inicioPagina.html");
	}
	
?>
<div  id="BannerSuperior" >
  <table width="100%">
    <tbody>
      <tr>
        <td width="215"><a title="" href="InicioPagina.html"><img src="Images/logoMensageria.PNG" width="300" height="" alt=""/></a></td>
        <td width="1100">&nbsp;</td>
        <td width="500" class="botones">&nbsp;
		  <table><tbody><tr><td>
			  <button type="button" class="btn botonesBanner" onclick="window.location.href='ConsultarServicio.php'">Consultar Servicios</button>
  			  <button type="button" class="btn" onclick="window.location.href='InicioPagina.html'">Salir</button>
		  </td></tr></tbody></table>
		</td>
      </tr>
    </tbody>
  </table>
</div>
<h1 class="titulo">Mensajeros</h1>
<form action="mensajeroPagina.php" method="post">

<table width="100%" class="tablaSer"><tbody>
	<tr class="encabezadoTR">
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Documento</h3></td> 
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Telefono</h3></td>
	<td style="padding-left: 1%; width: 0.6%;  border: #4A91AF 2px solid;"><h3>Correo Electrónico</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Tipo de Vehículo</h3></td>
	<td style="padding-left: 1%; width: 0.7%;  border: #4A91AF 2px solid;"><h3>Horario</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>    </h3></td>
		
	</tr>
	<tr class="RegTD">
	<?php
$daom= new DAOMensajero;
$daom->Listar();
?>
	<td class="RegTD"></td>
	<td class="RegTD"></td>
	<td class="RegTD"></td>
	<td class="RegTD"></td>
	<td class="RegTD"><table width="100%" class="tablaSer"><tbody><tr class="encabezadoTR">
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Día</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Hora Inicio</h3></td> 
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Hora Fin</h3></td></tr>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	</tbody></table></td>
	<td class="RegTD"><input type="submit" value="Ver" class="btn btn-lg" style="display: block; margin: auto;"></td>
	</tr>
</tbody></table>

</form>

<body>
</body>
</html>
