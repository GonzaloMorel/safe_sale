<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cliente
 *
 * @author gmorel
 */
class Cliente extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('menu_model');
        $this->load->model('familia_model');
        $this->load->model('usuario_model');
    }
    
    public function sign_up(){
        
    }
}
