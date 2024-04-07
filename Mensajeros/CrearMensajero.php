<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CrearMensajero</title>

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
	padding-top: 30px;
	padding-bottom: 30px;
	padding-left: 35%;
  	background-color: #ECB48F;
}
	.tipoDoc{
		width: 100%;
        padding: 10px;
        border: 1px solid #E78767;
        border-radius: 4px;
        font-size: 16px;
        margin-bottom: 10px;
		
	}
	.custom-checkbox {
            display: block;
            position: relative;
            cursor: pointer;
            font-size: 24px;
        }

        .custom-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #E78767;
            border-radius: 8px;
            position: relative;
            margin-right: 10px;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input[type="checkbox"]:checked + .checkmark:after {
            display: block;
        }

        .checkmark:after {
            left: 13px;
            top: 7px;
            width: 12px;
            height: 25px;
            border: solid white;
            border-width: 0 4px 4px 0;
            transform: rotate(45deg);
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

	.section {
            flex: 1;
            height: 100vh;
            overflow: hidden;
        }

        .left-section {
            width: 40%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-section {
            width: 60%;
            padding: 20px;
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
			  <button type="button" class="btn botonesBanner" onclick="window.location.href='CrearServicio.html'">Solicitar Servicio</button>
  			  <button type="button" class="btn" onclick="window.location.href='InicioPagina.html'">Salir</button>
		  </td></tr></tbody></table>
		</td>
      </tr>
    </tbody>
  </table>
</div>
<table width="100%"><tbody>
	<tr>
	<td style="width: 40%"><img src="Images/crearMensajero3.jpg" width="100%" height="85%" alt=""/></td>
	<td style="width: 60%">
	<table width="100%"><tbody>
	<tr>
		<td><h1 class="titulo">Crear Cuenta</h1></td>
	</tr>
	<tr>
		<td>
<form action="ConsultarMensajeros.php" method="post">
		<h2 >Datos Personales</h2>
          <table width="100%"><tbody>
			<tr>
			<td style="padding-left: 10%; width: 30%">
			<select id="tipo_documento" name="tipo_documento" class="tipoDoc" required>
				<option value="" disabled selected hidden>Tipo de Documento</option>
            	<option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
            	<option value="Cédula de Extranjería">Cédula de Extranjería</option>
            	<option value="Pasaporte">Pasaporte</option>
        	</select>
			</td>
				<td style="padding-left: 2%; width: 40%; padding-right: 10%"><input type="number" name="numDocumento"placeholder="Número Documento" class="tipoDoc"></td>
			</tr>
	  	  </tbody></table>
		  <table width="100%"><tbody>
		  <tr>
			<td style="padding-left: 5%; width: 12%">Fecha<br> Nacimiento: </td>
			<td style="padding-left: 2%; width: 2%"><input type="date" id="fecha" name="fecha" class="tipoDoc" required></td>
			<td style="padding-left: 5%; width: 30%"><input type="tel" name="tel"class="tipoDoc" placeholder="Teléfono" required></td>
			<td style="padding-left: 5%; width: 30%"><p>
			  <label>Sexo:
			    <input type="radio" name="sexo" value="Femenino" id="sexo_0">
			    F</label>
			  <label>
			    <input type="radio" name="sexo" value="Masculino" id="sexo_1">
			    M</label>
			 <label>
			    <input type="radio" name="sexo" value="No Binario" id="sexo_2">
			    No Binario</label>
			  </p></td>
		  </tr>
		  </tbody></table>
  		  <table width="100%"><tbody>
			<tr>
			<td style="padding-left: 3%;" >
			<input type="text" name="nacionalidad" placeholder="Nacionalidad" class="tipoDoc">
			</td>
				<td style="padding-left: 2%;">Cotizante <br>Seguridad Social</td>
				<td style="padding-left: 2%;"><label class="custom-checkbox"><input type="checkbox" name="cotizante" id="cotizante"><span class="checkmark"></span></label></td>
				<td style="padding-left: 1%; width: 50%"><input type="email" name = "correo" placeholder="Correo Electrónico" class="tipoDoc"></td>
			</tr>
	  	  </tbody></table>
		  
		<br><h2>Especificaciones Laborales</h2>
		<table width="100%"><tbody>
			<tr>
				<td style="padding-left: 2%; width: 25%; padding-right: 3%;"><select id="tipo_vehiculo" name="tipo_vehiculo" class="tipoDoc" required>
				<option value="" disabled selected hidden>Tipo de Vehículo</option>
            	<option value="moto">Moto</option>
            	<option value="bicicleta">Bicicleta</option>
        	</select></td>
			<td style="padding-left: 2%; width: 25%; padding-right: 2%;">Tipo de Transporte:
			<select multiple class="tipoDoc" name="tipoDoc" required>
				<option value="documento">Documento</option>
				<option value="paqueteP">Paquete Pequeño</option>
				<option value="paqueteM">Paquete Mediano</option>
				<option value="paqueteG">Paquete Grande</option>
			</select></td>
			<td style="padding-left: 2%; width: 20%; padding-right: 2%;">Días de Servicio:
			<select multiple class="tipoDoc" name="dia"required>
				<option value="Lunes">Lunes</option>
				<option value="Martes">Martes</option>
				<option value="Miercoles">Miércoles</option>
				<option value="Jueves">Jueves</option>
				<option value="Viernes">Viernes</option>
				<option value="Sabado">Sábado</option>
				<option value="Domingo">Domingo</option>
			</select></td>
			</tr>
		</tbody></table>
		<table width="100%"><tbody>
			<tr>
			<td style="padding-left: 15%; width: 20%;">Hora de Inicio:</td>
			<td style=" width: 20%;padding-right: 10%;"><input type="time" id="horaI" name="horaI" class="tipoDoc" required></td>
			<td style="padding-left: 5%; width: 10%;">Hora de Fin:</td>
			<td style=" width: 20%; padding-right: 10%;"><input type="time" class="tipoDoc" id="horaF" name="horaF" required></td>
			</tr>
		</tbody></table>
		<br><input type="submit" value="Crear" name="crear" class="btn btn-lg" style="display: block; margin: auto;"></td>
</form>
		</tr>
		</tbody></table>
	</td>
	</tr>
</tbody></table>


</body>
</html>
