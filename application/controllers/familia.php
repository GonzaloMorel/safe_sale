<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of familia
 *
 * @author gmorel
 */
class Familia extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('producto_model');
        $this->load->model('familia_model');
    }

    public function productos($id) {
        $result = $this->producto_model->get_all_producto_familia($id);

        $perfil = $this->session->userdata('perfil_id');
        if ($this->session->userdata('perfil_id') == NULL) {
            $perfil = 0;
        }
        $this->menu_model->datos_menu($perfil);

        $this->familia_model->menu_familias();
        $data['menu'] = $this->menu_model->getMenuConstruido();
        $data['categoria'] = $this->familia_model->getFamilia_construida();
        $data['contenido'] = 'categoria';
        $data['js_files'] = array();
        $data['css_files'] = array();
        $data['data'] = array($result);

        $this->load->view('template/template', $data);
    }

}
