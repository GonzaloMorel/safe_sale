<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of moneda_cambio_model
 *
 * @author gmorel
 */
class Moneda_cambio_model extends CI_Model {
    //datos moneda cambio
    private $id_monedaCambio;
    private $monedaId_monedaCambio;
    private $monto_monedaCambio;
    private $fecha_monedaCambio;
    private $estadoId_monedaCambio;
    //fin datos moneda cambio
    
    public function getId_monedaCambio() {
        return $this->id_monedaCambio;
    }

    public function getMonedaId_monedaCambio() {
        return $this->monedaId_monedaCambio;
    }

    public function getMonto_monedaCambio() {
        return $this->monto_monedaCambio;
    }

    public function getFecha_monedaCambio() {
        return $this->fecha_monedaCambio;
    }

    public function getEstadoId_monedaCambio() {
        return $this->estadoId_monedaCambio;
    }

    public function setId_monedaCambio($id_monedaCambio) {
        $this->id_monedaCambio = $id_monedaCambio;
    }

    public function setMonedaId_monedaCambio($monedaId_monedaCambio) {
        $this->monedaId_monedaCambio = $monedaId_monedaCambio;
    }

    public function setMonto_monedaCambio($monto_monedaCambio) {
        $this->monto_monedaCambio = $monto_monedaCambio;
    }

    public function setFecha_monedaCambio($fecha_monedaCambio) {
        $this->fecha_monedaCambio = $fecha_monedaCambio;
    }

    public function setEstadoId_monedaCambio($estadoId_monedaCambio) {
        $this->estadoId_monedaCambio = $estadoId_monedaCambio;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editarMonedaCambio($id){
        
    }
    
    public function crearMonedaCambio(){
        
    }
    
    public function datosMonedaCambio($id){
        
    }
}
