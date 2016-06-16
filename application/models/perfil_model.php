<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil_model
 *
 * @author gmorel
 */
class Perfil_model extends CI_Model {

    //datos perfil
    private $id_perfil;
    private $nombre_perfil;
    private $permisoId_perfil;
    private $estadoId_perfil;

    //fin datos perfil

    public function getId_perfil() {
        return $this->id_perfil;
    }

    public function getNombre_perfil() {
        return $this->nombre_perfil;
    }

    public function getPermisoId_perfil() {
        return $this->permisoId_perfil;
    }

    public function getEstadoId_perfil() {
        return $this->estadoId_perfil;
    }

    public function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    public function setNombre_perfil($nombre_perfil) {
        $this->nombre_perfil = $nombre_perfil;
    }

    public function setPermisoId_perfil($permisoId_perfil) {
        $this->permisoId_perfil = $permisoId_perfil;
    }

    public function setEstadoId_perfil($estadoId_perfil) {
        $this->estadoId_perfil = $estadoId_perfil;
    }

    public function __construct() {
        parent::__construct();
    }

    public function editar_perfil($id) {
        
    }

    public function crear_perfil() {
        
    }

    public function datos_perfil($id) {
        $query = $this->db->query("SELECT * FROM perfil WHERE perfil_id = $id");
        $result = $query->result();
        foreach ($result as $key):
            foreach ($key as $res):
                $datos[] = $res;
            endforeach;
        endforeach;
        $this->setId_perfil($datos[0]);
        $this->setNombre_perfil($datos[1]);
        $this->setPermisoId_perfil($datos[2]);
        $this->setEstadoId_perfil($datos[3]);
        $this->db->close();
        return $result;
    }

}
