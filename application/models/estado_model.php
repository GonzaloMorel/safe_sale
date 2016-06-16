<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado_model
 *
 * @author gmorel
 */
class Estado_model extends CI_Model {
    //datos estado
    private $id_estado;
    private $nombre_estado;
    private $desc_estado;
    private $estadoId_estado;
    //fin datos estado
    
    public function getId_estado() {
        return $this->id_estado;
    }

    public function getNombre_estado() {
        return $this->nombre_estado;
    }

    public function getDesc_estado() {
        return $this->desc_estado;
    }

    public function getEstadoId_estado() {
        return $this->estadoId_estado;
    }

    public function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    public function setNombre_estado($nombre_estado) {
        $this->nombre_estado = $nombre_estado;
    }

    public function setDesc_estado($desc_estado) {
        $this->desc_estado = $desc_estado;
    }

    public function setEstadoId_estado($estadoId_estado) {
        $this->estadoId_estado = $estadoId_estado;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editarEstado($id){
        
    }
    
    public function crearEstado(){
        
    }
    
    public function datosEstado($id){
        
    }
}
