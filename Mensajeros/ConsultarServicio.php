<?php
require "DAOServicio.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style type="text/css">
.botones {
	display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
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
<div  id="BannerSuperior" >
  <table width="100%">
    <tbody>
      <tr>
        <td width="215"><a title="" href="InicioPagina.html"><img src="Images/logoMensageria.PNG" width="300" height="" alt=""/></a></td>
        <td width="1100">&nbsp;</td>
        <td width="500" class="botones">&nbsp;
		  <table><tbody><tr><td>
			  <button type="button" class="btn" onclick="window.location.href='ConsultarMensajeros.php'">Consultar Mensajeros</button>
			  <button type="button" class="btn botonesBanner" onclick="window.location.href='CrearServicio.php'">Solicitar Servicio</button>
  			  <button type="button" class="btn" onclick="window.location.href='InicioPagina.html'">Salir</button>
		  </td></tr></tbody></table>
		</td>
      </tr>
    </tbody>
  </table>
</div>
<h1 class="titulo">Mis Servicios</h1>
<form action="ConsultarServicio.php" method="post">
<table width="100%" ><tbody>
	<tr>
	<td style="padding-left: 2%; width: 15%"><h3>Filtrar desde </h3></td><td style="width: 16%"><input type="date" id="fechaIni" name="fechaIni" required></td>
	<td style="width: 7%"><h3>hasta</h3></td><td><input type="date" id="fechaFin" name="fechaFin" required></td>
	</tr><br>
</tbody></table>
	<br>
<table width="100%" class="tablaSer"><tbody>
	<tr class="encabezadoTR">
	<th style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Fecha</h3></th> 
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Hora Inicio</h3></td>
	<td style="padding-left: 1%; width: 0.6%;  border: #4A91AF 2px solid;"><h3>Trayecto(s)</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Mensajero</h3></td>
	<td style="padding-left: 1%; width: 0.4%;  border: #4A91AF 2px solid;"><h3>Tarea</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Valor</h3></td>
	<td style="padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;"><h3>Tipo Pago</h3></td>
	<td style="padding-left: 1%; width: 0.1%;  border: #4A91AF 2px solid;"><h3>Calificación</h3></td>
	</tr>
	<tr class="RegTD">
	
	<td class="RegTD"></td><td class="RegTD"></td>
	<td class="RegTD"></td><td class="RegTD"></td>
	<td class="RegTD"></td><td class="RegTD"></td>
	<td class="RegTD"></td><td class="RegTD"></td>
	<?php
	$daom= new DAOServicio;

	if(isset($_POST["consultar"])){

	$daom->Listar($_REQUEST["fechaIni"],$_REQUEST["fechaFin"]);
}
?>
	</tr>
</tbody></table>
<br><input type="submit" value="Consultar" name="consultar" class="btn btn-lg" style="display: block; margin: auto;">
</form>

</body>
</html>