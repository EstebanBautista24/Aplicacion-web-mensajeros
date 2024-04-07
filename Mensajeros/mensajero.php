<?php
class mensajero{
    var $k_idMensajero;
    var $n_tipoServicio;
    var $i_vehiculo;
    var $i_seguridadSocial;
    var $n_correo;
    var $k_tipoDocumento;
    var $n_nacionalidad;
    var $f_fechaNacimiento;
    var $q_telefono;
    var $i_sexo;

    public function mensajero(){

    }
     // Getter y Setter para $k_documento
     public function get_k_idMensajero() {
        return $this->k_idMensajero;
    }

    public function set_k_idMensajero($valor) {
        $this->k_idMensajero = $valor;
    }

    // Getter y Setter para $n_tipoServicio
    public function get_n_tipo_Servicio() {
        return $this->n_tipoServicio;
    }

    public function set_n_tipoServicio($valor) {
        $this->n_tipoServicio = $valor;
    }

    // Getter y Setter para $i_vehiculo
    public function get_i_vehiculo() {
        return $this->i_vehiculo;
    }

    public function set_i_vehiculo($valor) {
        $this->i_vehiculo = $valor;
    }

    // Getter y Setter para $i_seguridadSocial
    public function get_i_seguridadSocial() {
        return $this->i_seguridadSocial;
    }

    public function set_i_seguridadSocial($valor) {
        $this->i_seguridadSocial = $valor;
    }

    // Getter y Setter para $n_correo
    public function get_n_correo() {
        return $this->n_correo;
    }

    public function set_n_correo($valor) {
        $this->n_correo = $valor;
    }

    // Getter y Setter para $k_tipoDocumento
    public function get_k_tipoDocumento() {
        return $this->k_tipoDocumento;
    }

    public function set_k_tipoDocumento($valor) {
        $this->k_tipoDocumento = $valor;
    }

    // Getter y Setter para $n_nacionalidad
    public function get_n_nacionalidad() {
        return $this->n_nacionalidad;
    }

    public function set_n_nacionalidad($valor) {
        $this->n_nacionalidad = $valor;
    }

    // Getter y Setter para $f_fechaNacimiento
    public function get_f_fechaNacimiento() {
        return $this->f_fechaNacimiento;
    }

    public function set_f_fechaNacimiento($valor) {
        $this->f_fechaNacimiento = $valor;
    }

    // Getter y Setter para $q_telefono
    public function get_q_telefono() {
        return $this->q_telefono;
    }

    public function set_q_telefono($valor) {
        $this->q_telefono = $valor;
    }

    // Getter y Setter para $i_sexo
    public function get_i_sexo() {
        return $this->i_sexo;
    }

    public function set_i_sexo($valor) {
        $this->i_sexo = $valor;
    }
}

?>