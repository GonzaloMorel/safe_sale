<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_model
 *
 * @author gmorel
 */
class Stock_model extends CI_Controller{
    protected $id;
    protected $producto_nombre;
    protected $bodega_id;
    protected $cantidad;
    protected $cantidad_mal_estado;
    protected $cantidad_con_detalle;
    protected $minimo;
    protected $estado_id;
    
    function getId() {
        return $this->id;
    }

    function getProducto_nombre() {
        return $this->producto_nombre;
    }

    function getBodega_id() {
        return $this->bodega_id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getCantidad_mal_estado() {
        return $this->cantidad_mal_estado;
    }

    function getCantidad_con_detalle() {
        return $this->cantidad_con_detalle;
    }

    function getMinimo() {
        return $this->minimo;
    }

    function getEstado_id() {
        return $this->estado_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProducto_nombre($producto_nombre) {
        $this->producto_nombre = $producto_nombre;
    }

    function setBodega_id($bodega_id) {
        $this->bodega_id = $bodega_id;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setCantidad_mal_estado($cantidad_mal_estado) {
        $this->cantidad_mal_estado = $cantidad_mal_estado;
    }

    function setCantidad_con_detalle($cantidad_con_detalle) {
        $this->cantidad_con_detalle = $cantidad_con_detalle;
    }

    function setMinimo($minimo) {
        $this->minimo = $minimo;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
    }

    public function __construct() {
        parent::__construct();
        $this->load->model("producto_model");
    }
    
    public function get_stock_all($id){
        $query = $this->db->query("
                                    SELECT 
                                      * 
                                    FROM
                                      stock st 
                                      LEFT OUTER JOIN producto p 
                                        ON p.producto_id = st.stock_producto_id 
                                      LEFT OUTER JOIN bodega b 
                                        ON b.bodega_id ");
        $result = $query->result();
        return $result;
    }
    
    public function get_stock_id($id){
        $query = $this->db->query("SELECT 
                                    stock_cantidad 
                                  FROM
                                    stock 
                                  WHERE stock_producto_id='$id'");
        $result = $query->result();
        return $result;
    }
    
    public function desc_stock($id, $cant){
        
//        $stock_producto = $this->producto_model->get_producto_stock($id);
        $stock = $this->get_stock_id($id);
        
        $total = intval($stock[0]->stock_cantidad) - intval($cant);
        
        $data = array(
               'stock_cantidad' => $total
            );

        $this->db->where('stock_producto_id', $id);
        $this->db->update('stock', $data); 
        
        $data2 = array(
               'producto_stock' => $total
            );

        $this->db->where('producto_id', $id);
        $this->db->update('producto', $data2);
        
        return;
        
    }
}
