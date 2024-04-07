<?php
class Horario{
    var $k_id_horario;
    var $k_tipoDocumento;
    var $k_idMensajero;
    var $n_dia;
    var $h_horaInicio;
    var $h_horaFinal;

public function Horario(){
}
 // Getter y Setter para $k_documento
 public function get_k_id_horario() {
    return $this->k_id_horario;
}
public function get_k_idMensajero() {
    return $this->k_idMensajero;
}

public function get_n_dia() {
    return $this->n_dia;
}
public function get_h_horaInicio() {
    return $this->h_horaInicio;
}
public function get_h_horaFinal() {
    return $this->h_horaFinal;
}
public function set_k_id_horario($valor) {
    $this->k_id_horario = $valor;
}
public function set_k_idMensajero($valor) {
    $this->k_idMensajero = $valor;
}

public function set_n_dia($valor) {
    $this->n_dia = $valor;
}
public function set_h_horaInicio($valor) {
    $this->h_horaInicio = $valor;
}
public function set_h_horaFinal($valor) {
    $this->h_horaFinal = $valor;
}

public function get_k_tipoDocumento() {
    return $this->k_tipoDocumento;
}
public function set_k_tipoDocumento($valor) {
    $this->k_tipoDocumento = $valor;
}
}

?>