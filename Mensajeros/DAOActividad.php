<?php

require_once "conexion.php";
require "Actividad.php";
class DAOActividad{
    var $con;
public function DAOActividad(){
    
}
public function insertar($objActividad){

    $c=conectar();
    $id_servicio = $_SESSION['id_servicio'];
    $k_idTrayecto=$objActividad->get_k_idTrayecto();
    $n_direccion=$objActividad->get_n_direccion();
    $n_descripcion=$objActividad->get_n_descripcion();
    $k_idServicio=$objActividad->get_k_idServicio();

    $sql="INSERT INTO actividad (n_direccion,n_descripcion,k_idServicio) VALUES ('$n_direccion','$n_descripcion',$id_servicio)";
    
    $result = pg_query($c,$sql);
    if(!$result){
        print "error al insertar";
    }else{
        print '<script languaje="JavaScript"> alert("Guardado!");<\script>';
    }
    pg_close($c);
}
public function Modificar($objActividad){
    $c=conectar();
    $k_idTrayecto=$objActividad->get_k_idTrayecto();
    $n_direccion=$objActividad->get_n_direccion();
    $n_descripcion=$objActividad->get_n_descripcion();
    $k_idServicio=$objActividad->get_k_idServicio();
    
    $sql="UPDATE Horario SET n_direccion='$n_direccion',n_descripcion='$n_descripcion' WHERE k_idTrayecto=$k_idTrayecto";
    
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