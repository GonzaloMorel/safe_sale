<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_model
 *
 * @author gmorel
 */
class Menu_model extends CI_Model{
    //datos menu
    private $id_menu;
    private $padreId_menu;
    private $nivel_menu;
    private $perfilId_menu;
    private $categoriaId_menu;
    private $estadoId_menu;
    // fin datos menu
    
    private $menu;
    private $menuConstruido;
    
    public function getId_menu() {
        return $this->id_menu;
    }

    public function getPadreId_menu() {
        return $this->padreId_menu;
    }

    public function getNivel_menu() {
        return $this->nivel_menu;
    }

    public function getPerfilId_menu() {
        return $this->perfilId_menu;
    }

    public function getCategoriaId_menu() {
        return $this->categoriaId_menu;
    }

    public function getEstadoId_menu() {
        return $this->estadoId_menu;
    }
    
    public function getMenu() {
        return $this->menu;
    }
    
    public function getMenuConstruido() {
        return $this->menuConstruido;
    }
        
    public function setId_menu($id_menu) {
        $this->id_menu = $id_menu;
    }

    public function setPadreId_menu($padreId_menu) {
        $this->padreId_menu = $padreId_menu;
    }

    public function setNivel_menu($nivel_menu) {
        $this->nivel_menu = $nivel_menu;
    }

    public function setPerfilId_menu($perfilId_menu) {
        $this->perfilId_menu = $perfilId_menu;
    }

    public function setCategoriaId_menu($categoriaId_menu) {
        $this->categoriaId_menu = $categoriaId_menu;
    }

    public function setEstadoId_menu($estadoId_menu) {
        $this->estadoId_menu = $estadoId_menu;
    }
    
    public function setMenu($menu) {
        $this->menu = $menu;
    }
    
    public function setMenuConstruido($menuConstruido) {
        $this->menuConstruido = $menuConstruido;
    }

        
    public function __construct() {
        parent::__construct();
        $this->load->model('categoria_menu_model');
        $this->menuConstruido = "";
    }
    
    public function editarMenu($id){
        
    }
    
    public function crearMenu(){
        
    }
    
    /**
     * datos_menu: Este metodo construye el menu
     * @param type $padre
     * @param type $nivel
     */ 
    public function datos_menu($perfil=0, $padre=0, $nivel=1){
        
//        echo "perfil: $perfil - padre: $padre - nivel: $nivel";
        if($perfil != 1):
            $perfil = $this->session->userdata('perfilId');
        endif;
        
        $query = $this->db->query("call sp_menu_get(\"$perfil\", $padre)");
        $result = $query->result();
        $this->db->close();
        
        if($nivel == 1){
            $this->menuConstruido .= "<ul id=\"menu\" class=\"nav navbar-nav navbar-right\">";
        }else{
            $this->menuConstruido .= "<ul class=\"dropdown-menu\" role=\"menu\">";
        }
        
        foreach($result as $key):
            
            if($key->contador > 0):
                $this->menuConstruido .= "<li class=\"dropdown\">"
                                            . "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\" href=\"".base_url().$key->categoria_menu_link."\" >".$key->categoria_menu_nombre
                                                    ."<span class=\"caret\"></span>"
                                            . "</a>";
//                $this->menu[]=$key;
                $this->datos_menu($perfil, $key->menu_id, $nivel+1);
                $this->menuConstruido .= "</li>";
            elseif($key->contador == 0):
//                $this->menu[]=$key;
                $this->menuConstruido .= "<li><a href=\"".base_url().$key->categoria_menu_link."\" >".$key->categoria_menu_nombre."</a></li>";
            endif;
        endforeach;
        $this->menuConstruido .= "</ul>";
    }
    


}