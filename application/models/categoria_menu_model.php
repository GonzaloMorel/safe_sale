<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria_menu_model
 *
 * @author gmorel
 */
class Categoria_menu_model extends ci_model{
    //datos categoria menu
    private $id_catMenu;
    private $nombre_catMenu;
    private $link_catMenu;
    private $desc_catMenu;
    private $orden_catMenu;
    private $estadoId_catMenu;
    
    public function getId_catMenu() {
        return $this->id_catMenu;
    }

    public function getNombre_catMenu() {
        return $this->nombre_catMenu;
    }

    public function getLink_catMenu() {
        return $this->link_catMenu;
    }

    public function getDesc_catMenu() {
        return $this->desc_catMenu;
    }

    public function getOrden_catMenu() {
        return $this->orden_catMenu;
    }

    public function getEstado_catMenu() {
        return $this->estado_catMenu;
    }

    public function setId_catMenu($id_catMenu) {
        $this->id_catMenu = $id_catMenu;
    }

    public function setNombre_catMenu($nombre_catMenu) {
        $this->nombre_catMenu = $nombre_catMenu;
    }

    public function setLink_catMenu($link_catMenu) {
        $this->link_catMenu = $link_catMenu;
    }

    public function setDesc_catMenu($desc_catMenu) {
        $this->desc_catMenu = $desc_catMenu;
    }

    public function setOrden_catMenu($orden_catMenu) {
        $this->orden_catMenu = $orden_catMenu;
    }

    public function setEstado_catMenu($estado_catMenu) {
        $this->estado_catMenu = $estado_catMenu;
    }

    public function __construct() {
        parent::__construct();
    }

    public function editarCatMenu($id){
    }
    
    public function crearCatMenu(){
        
    }
    
    public function datosCatMenu($id){
        
    }

}