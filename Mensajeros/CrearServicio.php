<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CrearServicio</title>
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
        <td width="215"><a title="" href="file:///D:/Descargas/PaginasFB/InicioPagina.html"><img src="Images/logoMensageria.PNG" width="300" height="" alt=""/></a></td>
        <td width="1100">&nbsp;</td>
        <td width="500" class="botones">&nbsp;
		  <table><tbody><tr><td>
			  <button type="button" class="btn" onclick="window.location.href='ConsultarMensajeros.php'">Consultar Mensajeros</button>
			  <button type="button" class="btn botonesBanner" onclick="window.location.href='ConsultarServicio.php'">Consultar Servicios</button>
  			  <button type="button" class="btn" onclick="window.location.href='InicioPagina.html'">Salir</button>
		  </td></tr></tbody></table>
		</td>
      </tr>
    </tbody>
  </table>
</div>
<form action="confirmacion.php" method="post">
<table width="100%">
    <tbody>
      <tr>
        <td width="1000" class=""><h1 class="titulo">Crear Servicio</h1></td>
		<td width="500" class=""><h1 class="titulo">Pago</h1></td>
      </tr>
	  <tr>
		<td>
		<table><tbody>
		<tr>
			<td class="encabezado">
			<h2>Tipo:</h2>
			</td>
			<td class="textoP">
			<input type="radio"  name="tipo" value ="solo ida" class="textoP" required>Solo ida<br><input type="radio"  name="tipo" value="ida y vuelta" class="textoP" required>Ida y vuelta
			</td>
			<td class="encabeza2">
			<h2>Fecha y hora:</h2>
			</td>
			<td class="textoP">
			<label for="fecha" class="textoFH">Fecha:</label>
        	<input type="date" id="fecha" name="fecha" class="tipoDocFechaHora" required><br>
			<label for="hora">Hora:</label>
        	<input type="time" id="hora" name="hora" class="tipoDocFechaHora" required>		
			</td>
		</tr>
		</tbody>
		</table>
		</td>
		 
		<td  style="width: 30%;" ><h2 class="textoP">Método:</h2><input type="radio"  name="tipoPago" style="width: 10%; " VALUE='Efectivo' required>Efectivo<br><input type="radio"  name="tipoPago" class="encabezado" style="width: 10%; " VALUE='PSE' required>PSE</td>
      </tr>
	  <tr>
		  <td >
		  <table><tbody>
		  <tr>
			<td class="encabezado"><input type="text" name="textfield" id="textfield" class="tipoDoc" placeholder="Desde" required><br></td>
		  </tr>
		  </tbody></table>
		  </td>
	  </tr>
	<tr><td style="width: 50%; padding-left: 2%; padding-top: 1%"><table><tbody>
		  <tr>
			  <td><h2>Ciudad:</h2></td>
			  <td style="width: 30%; padding-left: 2%;"> <input type="radio"  name="ciudad" style=" padding-left: 2%;" value="76000" required>  Cali</td>
			  <td><input type="radio"  name="ciudad" value="110"style=" padding-left: 2%;" required>    Bogotá</td>
		  </tr>
			<tr>
				  <td><h2>Tipo de Paquete:</h2></td>
				  <td><select multiple name="tipoDoc" class="tipoDoc" required>
						<option  name="tipoDoc" value="documento">Documento</option>
						<option name="tipoDoc"  value="paqueteP">Paquete Pequeño</option>
						<option name="tipoDoc" value="paqueteM">Paquete Mediano</option>
						<option name="tipoDoc" value="paqueteG">Paquete Grande</option>
					</select></td></td>
			  </tr>
		  </tbody></table></td>
		</tr>
	<tr><td style="width: 30%; padding-left: 2%"><br><h2>Trayectos:</h2></td></tr>
	  <tr>
		  
		<td style="width: 30%; padding-left: 2%"><br><label for="nombre">Trayecto 1:</label>
        <input type="text" id="viaje[]"  class="tipoCampos" name="nombre[]" style="width: 85%; padding-left: 2%" required>
	    <br><label for="descripcion">Descripción:</label>
        <textarea id="descripcion" class="tipoCampos" name="descripcion[]" style="width: 85%; padding-left: 2%" required></textarea>
        <br>
		<br><div id="campos"></div>
        <button type="button" onclick="agregarCampo()" class="btn btn-lg" style="display: block; margin: auto;">Agregar Trayecto</button>

        <br>

        <!-- Etiqueta para mostrar el número total de campos -->
        <label id="totalCampos">Total de Trayectos: 1</label>
		  
		</td>
	  </tr>
    </tbody>
</table>
	<input type="submit" value="Solicitar Servicio" name="solicitar"class="btn btn-lg" style="display: block; margin: auto;">
</form>
<script>
        let contadorCampos = 1;

        function agregarCampo() {
            contadorCampos++;

            // Crear un nuevo campo de texto para el nombre
            const nuevoCampoNombre = document.createElement("input");
            nuevoCampoNombre.type = "text";
            nuevoCampoNombre.name = "nombre[]";
			nuevoCampoNombre.required = true;
            nuevoCampoNombre.style.width = "85%";
            nuevoCampoNombre.style.paddingLeft = "2%";
			nuevoCampoNombre.classList.add("tipoCampos");

            // Crear un nuevo campo de texto para la descripción
            const nuevoCampoDescripcion = document.createElement("textarea");
            nuevoCampoDescripcion.name = "descripcion[]";
			nuevoCampoDescripcion.required = true;
            nuevoCampoDescripcion.style.width = "85%";
            nuevoCampoDescripcion.style.paddingLeft = "2%";
			nuevoCampoDescripcion.classList.add("tipoCampos");

            // Crear una nueva etiqueta para el nombre
            const nuevaEtiquetaNombre = document.createElement("label");
            nuevaEtiquetaNombre.textContent = "Trayecto " + contadorCampos + ":";

            // Crear una nueva etiqueta para la descripción
            const nuevaEtiquetaDescripcion = document.createElement("label");
            nuevaEtiquetaDescripcion.textContent = "Descripción:";

            // Agregar las nuevas etiquetas y campos al contenedor
            const contenedorCampos = document.getElementById("campos");
            contenedorCampos.appendChild(nuevaEtiquetaNombre);
            contenedorCampos.appendChild(nuevoCampoNombre);
            contenedorCampos.appendChild(document.createElement("br"));

            contenedorCampos.appendChild(nuevaEtiquetaDescripcion);
            contenedorCampos.appendChild(nuevoCampoDescripcion);
            contenedorCampos.appendChild(document.createElement("br"));
            contenedorCampos.appendChild(document.createElement("br")); // Espacio adicional para mejorar la presentación

            // Actualizar la etiqueta con el número total de campos
            document.getElementById("totalCampos").textContent = "Total de Trayectos: " + contadorCampos;
        }
    </script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.3.1.js"></script>
</body>
</html>