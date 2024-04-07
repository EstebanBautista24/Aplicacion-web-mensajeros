<?php
require "DAOServicio.php";
require "DAOActividad.php";
require "DAOPagoServicio.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ConfirmacionServicio</title>
<head>
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
<h1 class="titulo">Confirmación de Servicio</h1></td>
<table width="100%">
    <tbody>
      <tr>
        <td>
		  <p><strong>Tipo: <?php echo cargar()->get_i_tipoServicio(); ?></strong></p>
		  <p><strong>Fecha: <?php echo cargar()->get_f_fechaSolicitud(); ?></strong> <strong>Hora: <?php echo cargar()->get_h_hora(); ?></strong>
		  <p><strong>Desde:<?php echo cargarH()->get_n_direccion(); ?></strong> </p>

		  <?php
		 $viajes = $_POST['nombre'];
		 $descripciones = $_POST['descripcion']; 
		  if (count($viajes) == count($descripciones)) {
   
        foreach ($viajes as $indice => $viaje) {
            $descripcion = $descripciones[$indice];

			print"<p><strong>Trayecto: $viaje </strong> </p> <p><strong>Descripcion: $descripcion </strong> </p><br><br>";

        }
    } ?>
		  </td>
		  <td>
		  	<p><strong>Forma de Pago: <?php echo cargarP()->get_n_formaPago(); ?></strong> </p>
		  </td>
      </tr>
    </tbody>
  </table>
 <button type="button" class="btn botonesBanner" onclick="window.location.href='ConsultarServicio.php'" style="display: block; margin: auto;">Aceptar</button>
<body>
<?php
		$daos = new DAOServicio();

				
		function cargar(){
			

			$tiposervicio="A";

			if (isset($_POST["tipo"])) {
				$tipoSeleccionado = $_POST["tipo"];
				
				if ($tipoSeleccionado == "Solo ida") {
					$tiposervicio="Solo ida";
				} elseif ($tipoSeleccionado == "Ida y vuelta") {
					$tiposervicio="Ida y vuelta";
				} 
			}
			$idC=1;
			$servicio = new Servicio();
			//$servicio->set_k_idServicio();
			
			//$servicio->set_k_idMensajero($_REQUEST[);
			$servicio->set_n_tipoPaquete($_REQUEST["tipoDoc"]);
			$servicio->set_k_idCliente(1);
			$servicio->set_i_tipoServicio($_REQUEST["tipo"]);
			$servicio->set_h_hora($_REQUEST["hora"]);
			$servicio->set_f_fechaSolicitud($_REQUEST["fecha"]);
			$servicio->set_n_estado("En cola");

			$servicio->set_k_codigoPostal($_REQUEST["ciudad"]);


		
			return $servicio;
		}

		
		$daoa = new DAOActividad();
		function cargarH(){


			$actividad = new Actividad();
			$actividad->set_n_direccion($_REQUEST["textfield"]);
			$actividad->set_n_descripcion($_REQUEST["descripcion"]);
			

			return $actividad;
		}

		
		
		$daop = new DAOPagoServicio();
		function cargarP(){
			
			$pagoServicio = new PagoServicio();
			
			$pagoServicio->set_q_valorPagado(1000);
			$pagoServicio->set_n_formaPago($_REQUEST["tipoPago"]);

			return $pagoServicio;
		}
		if(isset($_POST["solicitar"])){
			
			
			$daos->insertar(cargar());
			$daop->insertar(cargarP());
			$daoa->insertar(cargarH());
			$viajes = $_POST['nombre'];
    $descripciones = $_POST['descripcion'];

    // Verificar si ambos arreglos tienen la misma longitud
    if (count($viajes) == count($descripciones)) {
        // Recorrer los arreglos con foreach
        foreach ($viajes as $indice => $viaje) {
            $descripcion = $descripciones[$indice];

			$daoa->insertar(cargarH());	
            echo "Trayecto: $viaje, Descripción: $descripcion <br>";
        }
    } else {
        echo "Los arreglos no tienen la misma longitud.";
    }
			
			
		}


?>
</body>
</html>
