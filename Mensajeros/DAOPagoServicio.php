<?php

    require_once "conexion.php";
    require "PagoServicio.php";


    class DAOPagoServicio{
        var $con;

    public function DAOPagoServicio(){

    }
    public function insertar($objPagoServicio){
        global $id_serivicio;
        $c=conectar();
        $id_servicio = $_SESSION['id_servicio'];
        $k_numRef=$objPagoServicio->get_k_numRef();
        $q_valorPagado=$objPagoServicio->get_q_valorPagado();
        $n_formaPago=$objPagoServicio->get_n_formaPago();
        $k_idServicio=$objPagoServicio->get_k_idServicio();
        

        
        $sql="INSERT INTO PagoServicio (q_valorPagado,n_formaPago,k_idServicio) VALUES ($q_valorPagado,'$n_formaPago', $id_servicio)";
        
        $result = pg_query($c,$sql);
        if(!$result){
            print "error al insertar";
        }else{
            print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
        }
        pg_close($c);
    }
    public function Modificar($objPagoServicio){
        $c=conectar();
        $k_numRef=$objPagoServicio->get_k_numRef();
        $q_valorPagado=$objPagoServicio->get_q_valorPagado();
        $n_formaPago=$objPagoServicio->get_n_formaPago();
        $k_idServicio=$objPagoServicio->get_k_idServicio();
        
        $sql="UPDATE PagoServicio SET k_numRef='$k_numRef',q_valorPagado='$q_valorPagado',n_formaPago='$n_formaPago',k_documento='$k_idServicio',";
        
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