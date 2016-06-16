<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of producto
 *
 * @author gmorel
 */
class Producto extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('familia_model');
        $this->load->model('producto_model');
        $this->load->model('menu_model');
    }
    
    /**
     * Detalle:
     * Este metodo memuestra el detalle de cada producto en particular
     * @param Integer $id
     */
    public function detalle($id){
//        echo "entraste al detalle el id es: $id";
        $result = $this->producto_model->get_producto($id);
        
        
        $perfil = $this->session->userdata('perfil_id');
            if($this->session->userdata('perfil_id') == NULL){
                $perfil = 0;
            }
            $this->menu_model->datos_menu($perfil);
            
        $this->familia_model->menu_familias();
        $data['menu'] = $this->menu_model->getMenuConstruido();
        $data['categoria'] = $this->familia_model->getFamilia_construida();
        $data['contenido'] = 'producto_view';
        $data['data'] = array($result);

        $this->load->view('template/template', $data);
    }
    
    /**
     * Agregar Carrito
     * Este metodo permite agregar productos al carrito de compras
     */
    function agregar_carrito() {
        
        
        $opciones = array(
            'foto'=> $this->input->post('foto'),
            'marca'=> $this->input->post('marca'),
            'modelo'=> $this->input->post('modelo'),
            'familia'=> $this->input->post('familia'),
            'precio'=> $this->input->post('precio'),
            'stock'=> $this->input->post('stock')
            
        ); //preparo el array de propiedades.

        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('cantidad'),
            'price' => $this->input->post('precio'),
            'name' => $this->input->post('nombre'),
            'options' => $opciones
        );// preparo el array para el carrito de compras.
        $this->cart->insert($data);
        redirect('carrito');
    }
    
    /**
     * Mostrar Carrito
     * Este metodo permite mostrar el carrito de compras
     */
    function mostrar_carrito() {
        $this->menu_model->datos_menu(1);
        $this->familia_model->menu_familias();
        $data['menu'] = $this->menu_model->getMenuConstruido();
        $data['categoria'] = $this->familia_model->getFamilia_construida();
        $data['contenido'] = 'carrito';
        $data['data'] = "";
        $this->load->view('template/template', $data);
    }
    
    /**
     * Vaciar Carrito
     * Esta Funcion permite vaciar el carrito de compras.
     */
    function vaciar_carrito() {
        $this->cart->destroy();
        redirect('carrito');
    }
    
    /**
     * Actualizar Carrito 
     * Este metodo permite actualizar el carrito de compras
     */
    function actualizar_carrito() {
        $rows = $this->input->post('rowid');
        $cantidades = $this->input->post('qty');
        $data = array();
        
        for ($i = 0; $i < sizeof($rows); $i++) {// recorro cada producto buscando una diferencia en la cantidad.
            $data[] = array(
                'rowid' => $rows[$i],
                'qty' => $cantidades[$i]
            );
        }
        
        $this->cart->update($data);
        
        
        $this->menu_model->datos_menu(1);
        $this->familia_model->menu_familias();
        $data2['menu'] = $this->menu_model->getMenuConstruido();
        $data2['categoria'] = $this->familia_model->getFamilia_construida();
        $data2['contenido'] = 'carrito';
        $data2['data'] = "";
        $this->load->view('template/template', $data2);
    }
}
