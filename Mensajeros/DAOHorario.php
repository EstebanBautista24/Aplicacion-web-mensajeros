<?php
    require_once "conexion.php";
    require "Horario.php";

    class DAOHorario{
        var $con;

    public function DAOHorario(){

    }
    public function insertar($objHorario){
        $c=conectar();

        $k_id_Horario=$objHorario->get_k_id_horario();
        $k_idMensajero=$objHorario->get_k_idMensajero();
        $n_dia=$objHorario->get_n_dia();
        $h_horaInicio=$objHorario->get_h_horaInicio();
        $h_horaFinal=$objHorario->get_h_horaFinal();
        $k_tipoDocumento=$objHorario->get_k_tipoDocumento();
        $sql="INSERT INTO Horario (n_dia,v_horaInicio,v_horaFin, k_documentoMensajero,k_tipoDocumento) VALUES ('$n_dia','$h_horaInicio','$h_horaFinal',$k_idMensajero,'$k_tipoDocumento')";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
    public function Modificar($objHorario){
        $c=conectar();

        $k_idMensajero=$objHorario->get_k_idMensajero();
        $n_dia=$objHorario->get_n_dia();
        $h_horaInicio=$objHorario->get_h_horaInicio();
        $h_horaFinal=$objHorario->get_h_horaFinal();
        
        $sql="UPDATE Horario SET n_dia='$n_dia',v_horaInicio='$h_horaInicio',v_horaFin='$h_horaFinal' WHERE k_documentoMensajero= $k_idMensajero";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
}
?>