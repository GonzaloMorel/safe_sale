<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of region_model
 *
 * @author gmorel
 */
class Region_model extends CI_Model{
    //datos region
    private $id_region;
    private $nombre_region;
    private $ordinal_region;
    private $paisId_region;
    private $estadoId_region;
    //fin datos region
    
    public function getId_region() {
        return $this->id_region;
    }

    public function getNombre_region() {
        return $this->nombre_region;
    }

    public function getOrdinal_region() {
        return $this->ordinal_region;
    }

    public function getPaisId_region() {
        return $this->paisId_region;
    }

    public function getEstadoId_region() {
        return $this->estadoId_region;
    }

    public function setId_region($id_region) {
        $this->id_region = $id_region;
    }

    public function setNombre_region($nombre_region) {
        $this->nombre_region = $nombre_region;
    }

    public function setOrdinal_region($ordinal_region) {
        $this->ordinal_region = $ordinal_region;
    }

    public function setPaisId_region($paisId_region) {
        $this->paisId_region = $paisId_region;
    }

    public function setEstadoId_region($estadoId_region) {
        $this->estadoId_region = $estadoId_region;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editar_region($id){
        
    }
    
    public function crear_region(){
        
    }
    
    public function datos_region($id){
        
    }
    
    public function region_pais($id){
        $query = $this->db->query("select * from region where region_pais_id = $id and region_estado_id != 1");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
}
