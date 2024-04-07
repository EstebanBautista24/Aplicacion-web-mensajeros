<?php
class servicio{

    var $k_idCliente;
    var $k_idMensajero;
    var $k_idServicio;
    var $n_tipoPaquete;
    var $f_fechaSolicitud;
    var $n_estado;
    var $k_codigoPostal;
    var $i_tipoServicio;
    var $h_hora;
 
    public function servicio(){

    }

     public function get_k_idCliente() {
        return $this->k_idCliente;
    }
    public function set_k_idCliente($valor) {
        $this->n_k_idCliente= $valor;
    }  public function get_k_idServicio() {
        return $this->k_idServicio;
    }
    public function set_k_idMensajero($valor) {
        $this->k_idMensajero = $valor;
    }
    public function set_k_idServicio($valor) {
        $this->k_idServicio = $valor;
    }
     public function get_k_idMensajero() {
        return $this->k_idMensajero;
    }

    public function get_n_tipoPaquete() {
   return $this->n_tipoPaquete;
    }

    public function set_n_tipoPaquete($valor) {
        $this->n_tipoPaquete = $valor;
    }


    public function get_f_fechaSolicitud() {
        return $this->f_fechaSolicitud;
    }

    public function set_f_fechaSolicitud($valor) {
        $this->f_fechaSolicitud = $valor;
    }


    public function get_n_estado() {
        return $this->n_estado;
    }

    public function set_n_estado($valor) {
        $this->n_estado = $valor;
    }


    public function get_k_codigoPostal() {
        return $this->k_codigoPostal;
    }

    public function set_k_codigoPostal($valor) {
        $this->k_codigoPostal = $valor;
    }
    public function get_i_tipoServicio() {
        return $this->i_tipoServicio;
    }

    public function set_i_tipoServicio($valor) {
        $this->i_tipoServicio = $valor;
    }
    public function get_h_hora() {
        return $this->h_hora;
    }

    public function set_h_hora($valor) {
        $this->h_hora = $valor;
    }
}

?>