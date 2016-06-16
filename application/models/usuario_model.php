<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_model
 *
 * @author gmorel
 */
class Usuario_model extends CI_Model{
    
    private $id;
    private $nombres;
    private $apPat;
    private $apMat;
    private $rut;
    private $dv;
    private $fechaNac;
    private $fechaIngre;
    private $foto;
    private $sucursalId;
    private $perfilId;
    private $cargoId;
    private $estadoId;
    private $logged;
    
    public function getId() {
        return $this->id;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApPat() {
        return $this->apPat;
    }

    public function getApMat() {
        return $this->apMat;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getDv() {
        return $this->dv;
    }

    public function getFechaNac() {
        return $this->fechaNac;
    }

    public function getFechaIngre() {
        return $this->fechaIngre;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getSucursalId() {
        return $this->sucursalId;
    }

    public function getPerfilId() {
        return $this->perfilId;
    }

    public function getCargoId() {
        return $this->cargoId;
    }

    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setApPat($apPat) {
        $this->apPat = $apPat;
    }

    public function setApMat($apMat) {
        $this->apMat = $apMat;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function setDv($dv) {
        $this->dv = $dv;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    public function setFechaIngre($fechaIngre) {
        $this->fechaIngre = $fechaIngre;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setSucursalId($sucursalId) {
        $this->sucursalId = $sucursalId;
    }


    public function setPerfilId($perfilId) {
        $this->perfilId = $perfilId;
    }

    public function setCargoId($cargoId) {
        $this->cargoId = $cargoId;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }
    
    public function getLogged() {
        return $this->logged;
    }

    public function setLogged($logged) {
        $this->logged = $logged;
    }

    
        //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function loggin($rut, $dv, $pass){
        $query = $this->db->query("call sp_loggin($rut, '$dv','$pass')");
        $result = $query->result();
        foreach($result as $key):
            foreach($key as $res):
                $datos[]=$res;
            endforeach;
        endforeach;
        $this->db->close();
        return $datos;
               
    }
    
    public function datos_usuario($rut, $dv){
        $query = $this->db->query("CALL sp_usuario_get($rut, '$dv')");
        $result = $query->result();
        foreach($result as $key):
            foreach($key as $res):
                $datos[]=$res;
            endforeach;
        endforeach;
        $this->setId($datos[0]);
        $this->setRut($datos[1]);
        $this->setDv($datos[2]);
        $this->setNombres($datos[3]);
        $this->setApPat($datos[4]);
        $this->setApMat($datos[5]);
        $this->setFechaNac($datos[6]);
        $this->setFechaIngre($datos[7]);
        $this->setFoto($datos[8]);
        $this->setSucursalId($datos[9]);
        $this->setPerfilId($datos[10]);
        $this->setCargoId($datos[11]);
        $this->setEstadoId($datos[13]);
        $this->setLogged(true);
        $this->db->close();
    }
    
    public function editarUsuario(){
        
    }
    
    public function listadoUsuarios(){
        $query = $this->db->query("SELECT * FROM usuario where usuario_estado_id = 2");
        $result = $query->result();
        $this->db->close();
        return $result;
    }
    
    
}
