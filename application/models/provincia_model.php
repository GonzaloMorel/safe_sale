<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of provincia_model
 *
 * @author gmorel
 */
class Provincia_model extends CI_Model{
    //datos provincia
    private $id_provincia;
    private $nombre_provincia;
    private $regionId_provincia;
    private $estadoId_provincia;
    //fin datos provincia
    
    
    public function getId_provincia() {
        return $this->id_provincia;
    }

    public function getNombre_provincia() {
        return $this->nombre_provincia;
    }

    public function getRegionId_provincia() {
        return $this->regionId_provincia;
    }

    public function getEstadoId_provincia() {
        return $this->estadoId_provincia;
    }

    public function setId_provincia($id_provincia) {
        $this->id_provincia = $id_provincia;
    }

    public function setNombre_provincia($nombre_provincia) {
        $this->nombre_provincia = $nombre_provincia;
    }

    public function setRegionId_provincia($regionId_provincia) {
        $this->regionId_provincia = $regionId_provincia;
    }

    public function setEstadoId_provincia($estadoId_provincia) {
        $this->estadoId_provincia = $estadoId_provincia;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editar_provincia($id){
        
    }
    
    public function crear_provincia(){
        
    }
    
    public function datos_provincia($id){
        
    }
    
    public function provincia_region($id){
        $query = $this->db->query("select * from provincia where provincia_region_id = $id and provincia_estado_id != 1");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
}
