<?php
class PagoServicio{
    var $k_numRef;
    var $q_valorPagado;
    var $n_formaPago;
    var $k_idServicio;

public function Horario(){
}
public function get_k_NumRef() {
    return $this->k_numRef;
}

public function set_k_numRef($k_numRef) {
    $this->k_numRef = $k_numRef;
}

public function get_q_valorPagado() {
    return $this->q_valorPagado;
}


public function set_q_valorPagado($q_valorPagado) {
    $this->q_valorPagado = $q_valorPagado;
}


public function get_n_formaPago() {
    return $this->n_formaPago;
}


public function set_n_formaPago($n_formaPago) {
    $this->n_formaPago = $n_formaPago;
}
public function get_k_idServicio() {
    return $this->k_idServicio;
}
public function set_k_idServicio($valor) {
    $this->k_idServicio = $valor;
}
}
?>