<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of familia_model
 *
 * @author gmorel
 */
class Familia_model extends CI_Model {
    //put your code here
    
    protected $id;
    protected $padre_id;
    protected $nivel;
    protected $nombre;
    protected $desc;
    protected $link;
    protected $estado;
    
    
    protected $familia_construida;
    
    
    function getId() {
        return $this->id;
    }

    function getPadre_id() {
        return $this->padre_id;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDesc() {
        return $this->desc;
    }

    function getLink() {
        return $this->link;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getFamilia_construida() {
        return $this->familia_construida;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setPadre_id($padre_id) {
        $this->padre_id = $padre_id;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setFamilia_construida($familia_construida) {
        $this->familia_construida = $familia_construida;
    }

    
    public function __construct() {
        parent::__construct();
        $this->familia_construida = "";
    }
    
    public function menu_familias2($padre=0, $nivel=1){
        
        $query = $this->db->query("call sp_familia_get($padre)");
        $result = $query->result();
        $this->db->close();
        
        if($nivel === 1):
            $this->familia_construida .= "<ul id=\"categorias\" class=\"dropdown-menu \" role=\"menu\" aria-labelledby=\"dropdownMenu\" style=\"display: block; position: static;\">";
        else:
            $this->familia_construida .= "<ul class=\"dropdown-menu\">";
        endif;
        
        foreach($result as $key):
//            print_r($result);
            if($key->contador > 0):
                $this->familia_construida .=    "<li class=\"divider\"></li><li class=\"dropdown-submenu\">"
                                                    . "<a tabindex=\"-1\" href=\"".base_url().$key->familia_link."\" >".$key->familia_nombre."</a>";
            
                $this->menu_familias($key->familia_id, $nivel+1);
                
                $this->familia_construida .=    "</li><li class=\"divider\">";
                
            elseif($key->contador === NULL):
                
                $this->familia_construida .=    "<li>"
                                                    . "<a href=\"".base_url().$key->familia_link."\" >".$key->familia_nombre."</a>"
                                                . "</li>";
            
            endif;
        endforeach;
        
        $this->familia_construida .= "</ul>";
    }
    
    public function menu_familias($padre=0, $nivel=1){
        
        $query = $this->db->query("call sp_familia_get($padre)");
        $result = $query->result();
        $this->db->close();
        
        if($nivel === 1):
            $this->familia_construida .= "<ul id=\"categorias\" class=\"nav nav-pills nav-stacked \" role=\"menu\" aria-labelledby=\"dropdownMenu\" style=\"display: block; position: static;\">";
        else:
            $this->familia_construida .= "<ul class=\"nav nav-pills dropdown-menu\">";
        endif;
        
        foreach($result as $key):
//            print_r($result);
            if($key->contador > 0):
                $this->familia_construida .=    "<li role=\"presentation\" class=\"divider\"></li><li class=\"dropdown-submenu\">"
                                                    . "<a tabindex=\"-1\" href=\"".base_url().$key->familia_link."\" >".$key->familia_nombre."</a>";
            
                $this->menu_familias($key->familia_id, $nivel+1);
                
                $this->familia_construida .=    "</li><li role=\"presentation\" class=\"divider\">";
                
            elseif($key->contador === NULL):
                
                $this->familia_construida .=    "<li role=\"presentation\">"
                                                    . "<a href=\"".base_url().$key->familia_link."\" >".$key->familia_nombre."</a>"
                                                . "</li>";
            
            endif;
        endforeach;
        
        $this->familia_construida .= "</ul>";
    }
    
    public function productos_familia($id){
        $query = $this->db->get_where('producto', array('producto_familia_id'=>$id));
        $result = $query->result_array();
        return $result;
    }
}
