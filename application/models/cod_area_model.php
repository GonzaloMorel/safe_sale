<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cod_area_model
 *
 * @author gmorel
 */
class Cod_area_model extends CI_Model{
    //datos cod area
    private $id_codArea;
    private $nro_codArea;
    private $regionId_codArea;
    private $estadoId_codArea;
    //fin datos cod area
    
    public function getId_codArea() {
        return $this->id_codArea;
    }

    public function getNro_codArea() {
        return $this->nro_codArea;
    }

    public function getRegion_codArea() {
        return $this->region_codArea;
    }

    public function getEstado_codArea() {
        return $this->estado_codArea;
    }

    public function setId_codArea($id_codArea) {
        $this->id_codArea = $id_codArea;
    }

    public function setNro_codArea($nro_codArea) {
        $this->nro_codArea = $nro_codArea;
    }

    public function setRegion_codArea($region_codArea) {
        $this->region_codArea = $region_codArea;
    }

    public function setEstado_codArea($estado_codArea) {
        $this->estado_codArea = $estado_codArea;
    }

    public function __construct() {
        parent::__construct();
    }
    
    public function editarCodArea($id){
        
    }
    
    public function crearCodArea(){
        
    }
    
    public function datosCodArea($id){
        
    }
}
