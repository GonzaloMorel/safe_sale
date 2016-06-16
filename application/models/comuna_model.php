<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comuna_model
 *
 * @author gmorel
 */
class Comuna_model extends ci_model{
    //datos comuna
    private $id_comuna;
    private $nombre_comuna;
    private $provinciaId_comuna;
    private $estadoId_comuna;
    //fin datos comuna
    
    public function getId_comuna() {
        return $this->id_comuna;
    }

    public function getNombre_comuna() {
        return $this->nombre_comuna;
    }

    public function getProvincia_comuna() {
        return $this->provincia_comuna;
    }

    public function getEstado_comuna() {
        return $this->estado_comuna;
    }

    public function setId_comuna($id_comuna) {
        $this->id_comuna = $id_comuna;
    }

    public function setNombre_comuna($nombre_comuna) {
        $this->nombre_comuna = $nombre_comuna;
    }

    public function setProvincia_comuna($provincia_comuna) {
        $this->provincia_comuna = $provincia_comuna;
    }

    public function setEstado_comuna($estado_comuna) {
        $this->estado_comuna = $estado_comuna;
    }

    public function __construct() {
        parent::__construct();
    }

    public function editar_comuna($id){
        
    }
    
    public function crear_comuna(){
        
       
    }
    
    public function datos_comuna($id){
        
    }
    
    public function comunas_provincia($id){
        $query = $this->db->query("select * from comuna where comuna_provincia_id = $id and comuna_estado_id != 1");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
}
