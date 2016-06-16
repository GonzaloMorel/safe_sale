<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of producto_model
 *
 * @author gmorel
 */
class Producto_model extends CI_Model {
    //put your code here
    
    protected $id;
    protected $nombre;
    protected $desc;
    protected $ficha_tecnica;
    protected $garantia;
    protected $garantia_mes;
    protected $alto;
    protected $ancho;
    protected $profundo;
    protected $peso;
    protected $marca_id;
    protected $modelo;
    protected $sub_familia_id;
    protected $precio;
    protected $stock;
    protected $estado;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDesc() {
        return $this->desc;
    }

    function getFicha_tecnica() {
        return $this->ficha_tecnica;
    }

    function getGarantia() {
        return $this->garantia;
    }

    function getGarantia_mes() {
        return $this->garantia_mes;
    }

    function getAlto() {
        return $this->alto;
    }

    function getAncho() {
        return $this->ancho;
    }

    function getProfundo() {
        return $this->profundo;
    }

    function getPeso() {
        return $this->peso;
    }

    function getMarca_id() {
        return $this->marca_id;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getSub_familia_id() {
        return $this->sub_familia_id;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setFicha_tecnica($ficha_tecnica) {
        $this->ficha_tecnica = $ficha_tecnica;
    }

    function setGarantia($garantia) {
        $this->garantia = $garantia;
    }

    function setGarantia_mes($garantia_mes) {
        $this->garantia_mes = $garantia_mes;
    }

    function setAlto($alto) {
        $this->alto = $alto;
    }

    function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    function setProfundo($profundo) {
        $this->profundo = $profundo;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setMarca_id($marca_id) {
        $this->marca_id = $marca_id;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setSub_familia_id($sub_familia_id) {
        $this->sub_familia_id = $sub_familia_id;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function get_producto($id){
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    producto p 
                                    LEFT OUTER JOIN familia f 
                                      ON p.producto_familia_id = f.familia_id 
                                    LEFT OUTER JOIN foto fot 
                                      ON fot.foto_producto_id = p.producto_id 
                                    LEFT OUTER JOIN marca m 
                                        ON m.marca_id = p.producto_marca_id 
                                      WHERE producto_id ='$id'");
        $result = $query->result();
        return $result;
    }
    
    public function get_all_producto_familia($id){
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    producto p 
                                    LEFT OUTER JOIN familia f 
                                      ON p.producto_familia_id = f.familia_id 
                                    LEFT OUTER JOIN foto fot 
                                      ON fot.foto_producto_id = p.producto_id  
                                    LEFT OUTER JOIN marca m 
                                       ON m.marca_id = p.producto_marca_id 
                                      WHERE producto_familia_id ='$id'");
        $result = $query->result();
        return $result;
    }
    
    public function get_all_producto(){
        
    }
    
    public function set_producto(){
        
    }
    
    public function erase_producto($id){
        
    }
    
    public function get_producto_stock($id){
        $query = $this->db->query("SELECT 
                                    producto_stock 
                                  FROM
                                    producto 
                                  WHERE producto_id  ='$id'");
        $result = $query->result();
        return $result;
    }
    
    public function actualiza_producto_stock($id, $stock){
        
//        echo "id: $id stock $stock";
        $data = array(
               'producto_stock' => $stock
            );

        $this->db->where('producto_id', $id);
        $this->db->update('producto', $data);
//        if($res){
         return;
//        }
    }
}
