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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ActualizarDatos</title>
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
  	background-color: #ECB48F;
    text-align: center;
}
.card-container {
            background-color: #e2be9a;
            padding: 35px;
            margin: 20px;
}
.container {
            margin: 10px;
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

        .custom-checkbox input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
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
			  	<button type="button" class="btn botonesBanner" onclick="window.location.href='ConsultarServicio.php'">Consultar Servicios</button>
  			  	<button type="button" class="btn" onclick="window.location.href='CrearServicio.html'">Salir</button>
            </td></tr></tbody></table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<tr>
    <td class="banner">
        <h1 class="titulo">Actualizar Datos</h1>
    </td>
</tr>
<tr>
<form action="#" method="post">
<div class="container">
    <table width="100%">
            <td class="card-container">
                <table width="100%"><tbody>
                    <tr>
                        <td style="padding-left: 2%; width: 30%"><input type="tel" class="tipoDoc" placeholder="Teléfono" name="tel" required></td>
                        <td style="padding-left: 2%; padding-right: 2%; width: 50%"><input type="email" placeholder="Correo Electrónico" name="correo" class="tipoDoc"></td>
                    </tr>
                </tbody></table>
                <table width="100%"><tbody>
                        <tr>
                            <td style="padding-left: 2%; width: 15%; padding-right: 3%;">
                                <select id="tipo_vehiculo" name="tipo_vehiculo" class="tipoDoc" required>
                                    <option value="" disabled selected hidden>Tipo de Vehículo</option>
                                    <option value="moto">Moto</option>
                                    <option value="bicicleta">Bicicleta</option>
                                </select>
                            </td>
                            <td style="width: 15%; padding-right: 2%;">
                                Tipo de Transporte:
                                <select multiple class="tipoDoc" name="tipoDoc" required>
                                    <option value="documento">Documento</option>
                                    <option value="paqueteP">Paquete Pequeño</option>
                                    <option value="paqueteM">Paquete Mediano</option>
                                    <option value="paqueteG">Paquete Grande</option>
                                </select>
                            </td>
                        </tr>  
                </tbody></table>
                <table width="100%"><tbody>
                    <tr>
                        <td style="padding-left: 2%; width: 70%; padding-right: 2%;">Días de Servicio:
                            <select multiple class="tipoDoc" name="dia" required>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select></td>
                            <td style="padding-left: 7%;">Cotizante <br>Seguridad Social</td>
                            <td style="padding-left: 2%;"><label class="custom-checkbox"><input type="checkbox" name="cotizante"><span class="checkmark"></span></label></td>
                    </tr>
                </tbody></table>
                <table width="100%"><tbody>
                    <tr>
                    <td style="padding-left: 15%; width: 20%;">Hora de Inicio:</td>
			    <td style=" width: 20%;padding-right: 10%;"><input type="time" id="horaI" name="horaI" class="tipoDoc" required></td>
			    <td style="padding-left: 5%; width: 10%;">Hora de Fin:</td>
			    <td style=" width: 20%; padding-right: 10%;"><input type="time" class="tipoDoc" id="horaF" name="horaF" required></td>
                    </tr>
                </table></tbody>
                <table width="100%"><tbody>
                <br><input type="submit" name="actualizar" value="Actualizar" class="btn btn-lg" style="display: block; margin: auto;"></td>
                </table></tbody>
            </td>
        </tr>
    </table>
</div>
</form>
<?php
	$daom = new DAOMensajero();
	function cargar(){
		$s_social="false";
		if(isset($_POST["cotizante"])){
			$s_social = "true";
		}
		
		$mensajero = new Mensajero();
        $idM = $_SESSION['idM'];
        echo $idM;
		$mensajero->set_k_idMensajero($idM);
		$mensajero->set_n_tipoServicio($_REQUEST["tipoDoc"]);
		$mensajero->set_i_vehiculo($_REQUEST["tipo_vehiculo"]);
		$mensajero->set_i_seguridadSocial($s_social);
		$mensajero->set_n_correo($_REQUEST["correo"]);

		$mensajero->set_q_telefono($_REQUEST["tel"]);


		return $mensajero;
	}

	$daoh = new DAOHorario();

	function cargarH(){

		$horario = new Horario();
        $idM = $_SESSION['idM'];
        echo $idM;
		$horario->set_k_idMensajero($idM);
		$horario->set_n_dia($_REQUEST["dia"]);
		$horario->set_h_horaInicio($_REQUEST["horaI"]);
		$horario->set_h_horaFinal($_REQUEST["horaF"]);

		return $horario;
		
	}
	if(isset($_POST["actualizar"])){
        $daoh->Modificar(cargarH());
		$daom->Modificar(cargar());
        
		
	}
	
?>

</body>
</html>