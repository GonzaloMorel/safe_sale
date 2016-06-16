<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pais_model
 *
 * @author gmorel
 */
class Pais_model extends CI_Model{
    //datos pais
    private $id_pais;
    private $nombre_pais;
    private $estadoId_pais;
    //fin datos pais  
    
    public function getId_pais() {
        return $this->id_pais;
    }

    public function getNombre_pais() {
        return $this->nombre_pais;
    }

    public function getEstadoId_pais() {
        return $this->estadoId_pais;
    }

    public function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }

    public function setNombre_pais($nombre_pais) {
        $this->nombre_pais = $nombre_pais;
    }

    public function setEstadoId_pais($estadoId_pais) {
        $this->estadoId_pais = $estadoId_pais;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editar_pais($id){
        
    }
    
    public function crear_pais(){
        
    }
    
    public function datos_pais($id){
        
    }
    
    public function trae_paices(){
        $query = $this->db->query("select * from pais where pais_estado_id != 1");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
  
}
