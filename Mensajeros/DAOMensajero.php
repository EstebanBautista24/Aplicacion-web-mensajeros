<?php
    include "conexion.php";
    require "mensajero.php";

    class DAOMensajero{
        var $con;

   
    public function DAOMensajero(){

    }
    public function insertar($objMensajero){
        $c=conectar();
        $k_tipoDocumento=$objMensajero->get_k_tipoDocumento();
        $k_idMensajero=$objMensajero->get_k_idMensajero();
        $n_tipo_Servicio=$objMensajero->get_n_tipo_Servicio();
        $i_vehiculo=$objMensajero->get_i_vehiculo();
        $i_seguridadSocial=$objMensajero->get_i_seguridadSocial();
        $n_correo=$objMensajero->get_n_correo();
        $n_nacionalidad=$objMensajero->get_n_nacionalidad();
        $f_fechaNacimiento=$objMensajero->get_f_fechaNacimiento();
        $q_telefono=$objMensajero->get_q_telefono();
        $i_sexo=$objMensajero->get_i_sexo();

        
        $sql="INSERT INTO mensajero VALUES ($k_idMensajero,'$k_tipoDocumento','$n_tipo_Servicio','$i_vehiculo',$i_seguridadSocial,'$n_correo','$n_nacionalidad',TO_DATE('$f_fechaNacimiento','YYYYMMDD'),$q_telefono,'$i_sexo')";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
    public function eliminar($objMensajero){
        $c=conectar();
        $k_tipoDocumento=$objMensajero->get_k_tipoDocumento();
        $k_idMensajero=$objMensajero->get_k_idMensajero();
        
        $sql="DELETE FROM Mensajero WHERE k_tipoDocumento=$k_tipoDocumento AND k_idMensajero=$k_idMensajero";
        if(!$c->query($sql)){
            print "error al eliminar";
        }else{
            print '<script languaje="JavaScript"> alert("Eliminado!");<\script>';
        }
        pg_close($c);
    }
    public function Modificar($objMensajero){
        $c=conectar();
        $k_tipoDocumento=$objMensajero->get_k_tipoDocumento();
        $k_idMensajero=$objMensajero->get_k_idMensajero();
        $n_tipo_Servicio=$objMensajero->get_n_tipo_Servicio();
        $i_vehiculo=$objMensajero->get_i_vehiculo();
        $i_seguridadSocial=$objMensajero->get_i_seguridadSocial();
        $n_correo=$objMensajero->get_n_correo();
        $n_nacionalidad=$objMensajero->get_n_nacionalidad();
        $f_fechaNacimiento=$objMensajero->get_f_fechaNacimiento();
        $q_telefono=$objMensajero->get_q_telefono();
        $i_sexo=$objMensajero->get_i_sexo();

        $sql="UPDATE Mensajero SET n_tipoServicio='$n_tipo_Servicio',n_vehiculo='$i_vehiculo',v_seguridadSocial='$i_seguridadSocial',n_correo='$n_correo',q_telefono='$q_telefono' WHERE k_documentoMensajero=$k_idMensajero";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
    public function Listar(){
        $c=conectar();
        $sql="SELECT Mensajero.k_documento, q_telefono, n_correo, n_vehiculo, n_dia, v_horaInicio, v_horaFin FROM Mensajero,Horario WHERE Mensajero.k_documento=Horario.k_documentoMensajero";
        $resultado=pg_query($c,$sql);
        print"<tr id='tr' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
        for ($i=0;$i<5;$i++){
            while ($fila=pg_fetch_row($resultado)){
                print"<tr id='tr' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
                for($j=0;$j<5;$j++){
                    print"<td id='td' class='RegTD'>".$fila[$j]."</td>";
                   
                }
                print "<td class='RegTD'>
                    <form method='POST' action='mensajeroPagina.php'>
                        <input type='hidden' name='idMensajero' value='" . $fila[0] . "'>
                        <input type='submit' name='verButton' value='Ver' class='btn btn-lg' style='display: block; margin: auto;'>
                    </form>
                </td>";
        
        print "</tr>";
            }
        }
        print"</tr>";
        pg_close($c);

    } 
    public function ListarMensajero($id){
        $c=conectar();
        $sql="SELECT Mensajero.k_documento, q_telefono,n_vehiculo, n_correo, n_dia,v_seguridadSocial FROM Mensajero,Horario WHERE Mensajero.K_documento=Horario.k_documentoMensajero AND Mensajero.k_documento=$id";
        $resultado=pg_query($c,$sql); 
        print"<tr><td style='padding: 3%;'><h2>Datos Personales</h2></td></tr>";
        for ($i=0;$i<5;$i++){
            while ($fila=pg_fetch_row($resultado)){
                print"<tr id='tr' style='padding-left: 1%; width: 0.3%;  border: #4A91AF 2px solid;'>";
                for($j=0;$j<5;$j++){
                    print"<tr><td style='padding-left: 5%;'><h5>$fila[$j]</h5></td></tr>";
                   
                }
               
                print" <form method='POST' action='#'>
                <input type='hidden' name='idmensajero' value='" . $fila[0] . "'>
                
                </form>";

        print "</tr>";
            }
        }
        print"</tr>";
        pg_close($c);

    }
}
?>