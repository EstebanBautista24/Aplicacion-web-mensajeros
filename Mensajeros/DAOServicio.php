<?php
    require_once "conexion.php";
    require "Servicio.php";
    
 
    class DAOServicio{
        var $con;

    public function DAOServicio(){

    }
    public function insertar($objServicio){
        $c=conectar();
        $k_idCliente=$objServicio->get_k_idCliente();
        $k_idMensajero=$objServicio->get_k_idMensajero();
        $k_idServicio=$objServicio->get_k_idServicio();
        $n_tipoPaquete=$objServicio->get_n_tipoPaquete();
        $f_fechaSolicitud=$objServicio->get_f_fechaSolicitud();
        $n_estado=$objServicio->get_n_estado();
        $k_codigoPostal=$objServicio->get_k_codigoPostal();
        $i_tipoServicio=$objServicio->get_i_tipoServicio();
        $h_hora=$objServicio->get_h_hora();


        $sql="INSERT INTO servicio (n_tipoPaquete,f_fechaSolicitud,n_estado,k_codigoPostal,k_idCliente,h_hora ,i_tipoServicio)  VALUES (' $n_tipoPaquete',TO_DATE('$f_fechaSolicitud','YYYYMMDD'),'$n_estado',$k_codigoPostal,1,'$h_hora','$i_tipoServicio') RETURNING k_idServicio";
        
   
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        $result_last_id = pg_query($c, "SELECT lastval()");
    $id_servicio = pg_fetch_result($result_last_id, 0, 0);
    
     $_SESSION['id_servicio'] = $id_servicio;
        pg_close($c);
    }
    public function Agregar($objServicio){
        $c=conectar();
        $k_idCliente=$objServicio->get_k_idCliente();
        $k_idMensajero=$objServicio->get_k_idMensajero();
        $k_idServicio=$objServicio->get__k_idServicio();
        $n_tipoPaquete=$objServicio->get_n_tipoPaquete();
        $f_fechaSolicitud=$objServicio->get_f_fechaSolicitud();
        $n_estado=$objServicio->get_n_estado();
        $k_codigoPostal=$objServicio->get_k_codigoPostal();

        $sql="UPDATE Servicio SET k_idCliente='$k_idCliente',k_idMensajero=' $k_idMensajero',idServicio='$k_idServicio',n_tipoPaquete=' $n_tipoPaquete',f_fechaSolicitud='$f_fechaSolicitud',n_estado='$n_estado',k_codigoPostal='$k_codigoPostal' ";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
    public function Listar($FechaInicio, $FechaFinal){
        $c=conectar();
        $sql="SELECT f_fechaSolicitud, h_hora,actividad.k_idtrayecto,k_documentoMensajero, n_descripcion,q_valorPagado, n_formaPago FROM Servicio,PagoServicio,Actividad WHERE Servicio.k_idServicio=Actividad.k_idServicio AND Servicio.k_idServicio=PagoServicio.k_idServicio AND f_fechaSolicitud BETWEEN TO_DATE('$FechaInicio','YYYYMMDD')AND TO_DATE('$FechaFinal','YYYYMMDD')";
        $resultado=pg_query($c,$sql);
        print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
        for ($i=0;$i<7;$i++){
            while ($fila=pg_fetch_row($resultado)){
                print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
                for($j=0;$j<7;$j++){
                    print"<td id='td' class='RegTD'>".$fila[$j]."</td>";
                }
                print"</tr>";
            }
        }
        print"</tr>";
        pg_close($c);

    } 
    public function ListarSinM(){
        $c=conectar();
        $sql="SELECT servicio.k_idServicio,n_tipoPaquete, n_direccion,f_fechaSolicitud, actividad.k_idtrayecto, n_descripcion FROM Servicio,PagoServicio,Actividad WHERE Servicio.k_idServicio=Actividad.k_idServicio AND Servicio.k_idServicio=PagoServicio.k_idServicio AND servicio.k_documentoMensajero IS NULL";
        $resultado=pg_query($c,$sql);
        print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
        for ($i=0;$i<6;$i++){
            while ($fila=pg_fetch_row($resultado)){
                print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
                for($j=0;$j<6;$j++){
                    print"<td id='td' class='RegTD'>".$fila[$j]."</td>";
                }
                print "<td class='RegTD'>
                <form method='POST' action='#'>
                <input type='hidden' name='idServicio' value='" . $fila[0] . "'>
                <input type='submit' name='btnAceptar' value='Aceptar' class='btn btn-lg' style='display: block; margin: auto;'>
            </form>
        </td>";

                
                print"</tr>";
            }
        }
        
        print"</tr>";
        pg_close($c);

    } 
    public function aceptarEnvio($idS,$idM){
        $c=conectar();
        $sql="UPDATE servicio SET k_documentoMensajero=$idM WHERE k_idServicio=$idS";
        $resultado=pg_query($c,$sql);

    }
    public function ListarConM($idM){
        $c=conectar();
        $sql="SELECT servicio.k_idServicio,n_tipoPaquete, n_direccion,f_fechaSolicitud,actividad.k_idtrayecto, n_descripcion FROM Servicio,PagoServicio,Actividad WHERE Servicio.k_idServicio=Actividad.k_idServicio AND Servicio.k_idServicio=PagoServicio.k_idServicio AND servicio.k_documentoMensajero=$idM";
        $resultado=pg_query($c,$sql);
        print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
        for ($i=0;$i<6;$i++){
            while ($fila=pg_fetch_row($resultado)){
                print"<tr id='tr' class='RegTD' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
                for($j=0;$j<6;$j++){
                    print"<td id='td' class='RegTD'>".$fila[$j]."</td>";
                }
                
                
                print"</tr>";
            }
        }
        
        print"</tr>";
        pg_close($c);

    } 

}
?>