<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of moneda_model
 *
 * @author gmorel
 */
class Moneda_model extends CI_Model{
    //datos moneda
    private $id_moneda;
    private $nombre_moneda;
    private $simbolo_moneda;
    private $estadoId_moneda;
    //fin datos moneda
    
    public function getId_moneda() {
        return $this->id_moneda;
    }

    public function getNombre_moneda() {
        return $this->nombre_moneda;
    }

    public function getSimbolo_moneda() {
        return $this->simbolo_moneda;
    }

    public function getEstadoId_moneda() {
        return $this->estadoId_moneda;
    }

    public function setId_moneda($id_moneda) {
        $this->id_moneda = $id_moneda;
    }

    public function setNombre_moneda($nombre_moneda) {
        $this->nombre_moneda = $nombre_moneda;
    }

    public function setSimbolo_moneda($simbolo_moneda) {
        $this->simbolo_moneda = $simbolo_moneda;
    }

    public function setEstadoId_moneda($estadoId_moneda) {
        $this->estadoId_moneda = $estadoId_moneda;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editarMoneda($id){
        
    }
    
    public function crearMoneda(){
        
    }
    
    public function datosMoneda($id){
        
    }
    
    public function listadoMoneda(){
        $query = $this->db->query("SELECT * FROM moneda WHERE moneda_estado_id = 2");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
}
