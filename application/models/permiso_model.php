<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of permiso_model
 *
 * @author gmorel
 */
class Permiso_model extends CI_Model {
    //datos permiso
    private $id_permiso;
    private $nombre_permiso;
    private $desc_permiso;
    private $estadoId_permiso;
    //fin datos permiso
    
    public function getId_permiso() {
        return $this->id_permiso;
    }

    public function getNombre_permiso() {
        return $this->nombre_permiso;
    }

    public function getDesc_permiso() {
        return $this->desc_permiso;
    }

    public function getEstadoId_permiso() {
        return $this->estadoId_permiso;
    }

    public function setId_permiso($id_permiso) {
        $this->id_permiso = $id_permiso;
    }

    public function setNombre_permiso($nombre_permiso) {
        $this->nombre_permiso = $nombre_permiso;
    }

    public function setDesc_permiso($desc_permiso) {
        $this->desc_permiso = $desc_permiso;
    }

    public function setEstadoId_permiso($estadoId_permiso) {
        $this->estadoId_permiso = $estadoId_permiso;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editarPermiso($id){
        
    }
    
    public function crearPermiso(){
        
    }
    
    public function datosPermisos($id){
        
    }
}
