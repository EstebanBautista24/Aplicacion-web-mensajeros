<?php
class Actividad{
    var $n_direccion;
    var $n_descripcion;
    var $k_idTrayecto;
    var $k_idServicio;

public function Actividad(){
}
 // Getter para $n_direccion
 public function get_n_direccion() {
    return $this->n_direccion;
}

// Setter para $n_direccion
public function set_n_direccion($n_direccion) {
    $this->n_direccion = $n_direccion;
}

// Getter para $n_descripcion
public function get_n_descripcion() {
    return $this->n_descripcion;
}

// Setter para $n_descripcion
public function set_n_descripcion($n_descripcion) {
    $this->n_descripcion = $n_descripcion;
}

// Getter para $k_idTrayecto
public function get_k_idTrayecto() {
    return $this->k_idTrayecto;
}

// Setter para $k_idTrayecto
public function set_k_idTrayecto($k_idTrayecto) {
    $this->k_idTrayecto = $k_idTrayecto;
}

// Getter para $k_idServicio
public function get_k_idServicio() {
    return $this->k_idServicio;
}

// Setter para $k_idServicio
public function set_k_idServicio($k_idServicio) {
    $this->k_idServicio = $k_idServicio;
}





}
?>