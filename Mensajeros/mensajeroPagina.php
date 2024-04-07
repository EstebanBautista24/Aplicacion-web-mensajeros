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
<title>confirmacionMensajero</title>
<style type="text/css">
.botones {
	display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}
.titulo {
	color: #f9423a;
	font-family: 'Ubuntu', sans-serif;
  	font-size: 3rem;
	padding: 20px;
  	background-color: #ECB48F;
}
.tablaSer{
  border: #4A91AF 2px solid;
}
.RegTD{
  padding-left: 1%; 
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
	
<div  id="BannerSuperior" >
  <table width="100%">
    <tbody>
      <tr>
        <td width="215"><a title="" href="InicioPagina.html"><img src="Images/logoMensageria.PNG" width="300" height="" alt=""/></a></td>
        <td width="1100">&nbsp;</td>
        <td width="500" class="botones">&nbsp;
		  <table><tbody><tr><td>
			  <button type="button" class="btn botonesBanner" onclick="window.location.href='ConsultarServicio.php'">Consultar Servicios</button>
  			  <button type="button" class="btn" onclick="window.location.href='CrearServicio.html'">Salir</button>
		  </td></tr></tbody></table>
		</td>
      </tr>
    </tbody>
  </table>
</div>
<h1 class="titulo">Mensajero </h1></td>
<table width="100%"><tbody>
<tr>
	<td width="25%"><table><tbody>
	

	<?php

	$daom = new DAOMensajero();

if(isset($_POST['verButton'])){
	$idM = $_POST['idMensajero'];
    $_SESSION['idM'] = $idM; 

	echo $idM;
	$daom->ListarMensajero($_POST['idMensajero']);

}
$daos=new DAOServicio();
if(isset($_POST["btnAceptar"])){
	$idM = $_SESSION['idM'];
	$daos->aceptarEnvio($_POST['idServicio'],$idM);
	$daom->ListarMensajero($idM);

	
	
}

?>
	<tr><td><br><button type="button" class="btn" style="display: block; margin: auto;" onclick="window.location.href='ActualizarMensajero.php'">Actualizar Datos</button></td></tr>
	</tbody></table></td>
	<td width="0.5%" style="background: #E48C64;"></td>
	<td width="5%"></td>
	<td><table style="padding-left: 1%;"><tbody>
	<tr><td><h2>Envíos Completados</h2></td></tr>
	<br><tr><td width="50%"><table width="100%" class="tablaSer"><tbody>
	
	<tr class="encabezadoTR">
	<th style="padding-left: 1%; padding-right: 1%;  border: #4A91AF 2px solid;"><h3>Id</h3></th> 
	<th style="padding-left: 1%; padding-right: 1%;  border: #4A91AF 2px solid;"><h3>Envío</h3></th> 
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Lugar</h3></td>
	<td style="padding-left: 1%; padding-right: 5%;  border: #4A91AF 2px solid;"><h3>Fecha</h3></td>
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Trayecto(s)</h3></td>
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Descripción</h3></td>
	</tr>
	<?php
	$daos->ListarConM($idM);
	echo $idM;
	?>
	<tr class="RegTD">
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	</tr>
	</tbody></table>
	</td></tr>
	<tr><td><br><h2>Solicitudes de envío</h2></td></tr>
	<form action="" method="post">
	<tr><td width="50%"><table width="100%" class="tablaSer"><tbody>
	<tr class="encabezadoTR">
	<th style="padding-left: 1%; padding-right: 1%;  border: #4A91AF 2px solid;"><h3>Id</h3></th> 
	<th style="padding-left: 1%; padding-right: 1%;  border: #4A91AF 2px solid;"><h3>Envío</h3></th> 
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Lugar</h3></td>
	<td style="padding-left: 1%; padding-right: 5%;  border: #4A91AF 2px solid;"><h3>Fecha</h3></td>
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Trayecto(s)</h3></td>
	<td style="padding-left: 1%; padding-right: 15%;  border: #4A91AF 2px solid;"><h3>Descripción</h3></td>
	<td style="padding-left: 1%; padding-right: 10%;  border: #4A91AF 2px solid;"><h3></h3></td>
	</tr>
	<?php
	$daos = new DAOServicio();

if(isset($_POST['verButton'])){
	$daos->ListarSinM();
}
if(isset($_POST["btnAceptar"])){

	$daos->ListarSinM();
	
	
}

?>
	<tr class="RegTD">
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD">s</td>
	<td class="RegTD"><input type="submit" value="Aceptar" class="btn btn-lg" style="display: block; margin: auto;"></td>
	</tr>
	</tbody></table></td></tr>
	</form>
	</tbody></table></td>
</tr>
</tbody></table>
<body>


</body>
</html>
