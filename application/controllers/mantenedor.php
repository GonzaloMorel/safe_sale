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
class Mantenedor extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('familia_model');
        $this->load->model('usuario_model');
        $this->load->model('producto_model');
    }
    
    public function salida($datos){
            $perfil = $this->session->userdata('perfil_id');
            if($this->session->userdata('perfil_id') == NULL){
                $perfil = 0;
            }
            $this->menu_model->datos_menu($perfil);
            
            $this->familia_model->menu_familias();
            $data['menu'] = $this->menu_model->getMenuConstruido();
            $data['categoria'] = $this->familia_model->getFamilia_construida();
            $data['contenido'] = 'example';
            $data['data'] = $datos;

//            $this->load->view('template/template', $data);
            $this->load->view('mantenedor_view', $data);
            
    }//end salida
    
    public function redirect(){
        redirect('default_controler');
        
//        $this->load->view('example');
        
    }
    
    public function unique_field_name($field_name) {
	return 's'.substr(md5($field_name),0,8);
    }
    
    public function bodega(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Bodegas');
            $crud->set_table('bodega');

            $crud->set_relation('bodega_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('bodega_sucursal_id', 'sucursal', 'sucursal_nombre');


            $output = $crud->render();


            $this->salida($output);
        else:
            redirect("home");
        endif;
    }//end bodega
    
    public function categoria_menu(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Categoria menu');
            $crud->set_table('categoria_menu');

            $crud->set_relation('categoria_menu_estado_id', 'estado', 'estado_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end categoria_menu
    
    public function cliente(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            
            $this->load->config('grocery_crud');
            $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'jpeg|jpg');

            $crud->set_subject('Clientes');
            $crud->set_table('cliente');

            $crud->columns('cliente_rut', 'cliente_dv', 'cliente_nombres', 'cliente_apPat', 'cliente_apMat', 'cliente_mail', 'cliente_foto', 'cliente_estado_id');
            $crud->unset_add_fields('cliente_estado_id');
            
            
            $crud->display_as('cliente_rut', 'Rut')
                    ->display_as('cliente_dv', 'Dv')
                    ->display_as('cliente_nombres', 'Nombres')
                    ->display_as('cliente_apPat', 'Apellido Paterno')
                    ->display_as('cliente_apMat', 'Apellido Materno')
                    ->display_as('cliente_fecha_nacimiento', 'Fecha Nacimiento')
                    ->display_as('cliente_mail', 'E-Mail')
                    ->display_as('cliente_tel', 'Telefono')
                    ->display_as('cliente_cel', 'Celular')
                    ->display_as('cliente_estado_id', 'Estado');
            
            $crud->callback_column('cliente_foto',array($this, 'call_back_foto_convert'));

            $crud->set_relation('cliente_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('cliente_comuna_id', 'comuna', 'comuna_nombre');
            
            $crud->set_field_upload('cliente_foto','assets/uploads/files');
            
            $crud->callback_before_upload(array($this, 'imagen_callback_before_upload'));//llamo antes de subir archivo
            $crud->callback_before_insert(array($this, 'imagen_callback_before_insert'));//llamo antes de insertar
            $crud->callback_before_insert(array($this,'pass_cliente_md5_encript'));
            
            $crud->callback_before_update(array($this,'pass_cliente_md5_encript'));

            $output = $crud->render();

            $this->salida($output);
            
        else:
            redirect("default_controller");
        endif;
    }//End cliente
    
    public function comuna(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Comuna');
            $crud->set_table('comuna');


            $crud->set_relation('comuna_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('comuna_provincia_id', 'provincia', 'provincia_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    } //end comuna
    
    public function empresa(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Empresa');
            $crud->set_table('empresa');
            
            $crud->columns('empresa_nombre', 'empresa_rut','empresa_dv','empresa_giro','empresa_estado_id');


            $crud->set_relation('empresa_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('empresa_comuna_id', 'comuna', 'comuna_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    } // end empresa
    
    public function familia(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado
            
                   
            $crud = new grocery_CRUD();
            $crud->set_subject('Familia');
            $crud->set_table('familia');
            
            $crud->columns('familia_nombre','familia_padre_id','familia_nivel', 'familia_link', 'familia_estado_id');
            $crud->unique_fields('familia_nombre','familia_link');
    
            $crud->add_fields('familia_padre_id', 'familia_nivel', 'familia_nombre', 'familia_desc','familia_link');
            $crud->edit_fields('familia_padre_id', 'familia_nivel', 'familia_nombre', 'familia_desc','familia_estado_id','familia_link');
            $crud->unset_fields('familia_link');
            $crud->required_fields('familia_padre_id', 'familia_nivel', 'familia_nombre', 'familia_desc');
            
            
            $crud->callback_column($this->unique_field_name('familia_padre_id'),function($value, $row) {
                if($value == ""){
                    $value = "Padre";
                }
		return $value;
            });
            

            
            $crud->callback_field('familia_nivel', function(){
                $option = '<select name="familia_nivel" id="familia_nivel" class="form_control">';
        
                for($i=1;$i<=10;$i++){
                    $option .= '<option value="'.$i.'">'.$i.'</option>';
                }

                $option .= '</select>';
                return $option;
            });
            
            $crud->callback_add_field('familia_link', array($this, 'link_familia_callback'));
            
            $crud->display_as('familia_padre_id', 'Padre');

            $crud->set_relation('familia_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('familia_padre_id', 'familia', 'familia_nombre');
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end familia
    
    public function foto(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado
            
            
        
            $crud = new grocery_CRUD();
            $this->config->set_item('grocery_crud_file_upload_allow_file_types', 'jpeg|jpg');
            
            $crud->set_subject('Foto');
            $crud->set_table('foto');
            
            $crud->display_as('foto_producto_id','Producto')
                    ->display_as('foto_estado_id','Estado');
            
            $crud->unset_columns('foto_exten');
            $crud->unset_fields('foto_exten','foto_estado_id');
            
            $producto = $this->uri->segment(4);
            
            if($producto != FALSE){
                $crud->callback_add_field('foto_producto_id',function(){
                    $producto = $this->uri->segment(4);
//                    return '<input type="text" value="$producto" readonly="readonly" class="form"/>';
                    return '<input type="text" maxlength="50" value="'.$producto.'" name="foto_producto_id" style="width:462px;" readonly="readonly"/>';
                });
            }
            
            $crud->callback_column('foto_data',array($this, 'call_back_foto_convert'));
            
            $crud->callback_edit_field('foto_data', function($value){
                $foto = "data:image/jpeg;base64,".$value;
        
                return '<img src="'.$foto.'" alt="foto" style="height:400px;">';
            });

            $crud->set_relation('foto_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('foto_producto_id', 'producto', 'producto_nombre');
            
            $crud->set_field_upload('foto_data','assets/uploads/files');
            
            $crud->callback_before_upload(array($this, 'imagen_callback_before_upload'));//llamo antes de subir archivo
            $crud->callback_before_insert(array($this, 'foto_callback_before_insert'));//llamo antes de insertar
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end foto
    
    public function log_envio(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Log Envio');
            $crud->set_table('log_envio');

            $crud->set_relation('log_envio_estado_id', 'estado', 'estado_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end region
    
    public function marca(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Marca');
            $crud->set_table('marca');
            $crud->set_relation('marca_estado_id', 'estado', 'estado_nombre');
            $crud->unset_add_fields('marca_estado_id');
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end marca
    
    public function menu(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Menu');
            $crud->set_table('menu');
            
            $crud->columns('menu_id','menu_padre_id','menu_nivel','menu_perfil_id', 'menu_categoria_id','menu_estado_id');
            
//            $crud->set_relation_n_n('menu_padre_id', 'menu','categoria_menu', 'menu_padre_id', 'menu_id','categoria_menu_nombre','menu_categoria_id');
            
            $crud->set_relation('menu_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('menu_categoria_id', 'categoria_menu', 'categoria_menu_nombre');
            $crud->set_relation('menu_padre_id', 'menu', 'menu_categoria_id');
            $crud->set_relation('menu_perfil_id', 'perfil', 'perfil_nombre');
            
            
            $crud->callback_column('menu_padre_id',array($this,'nombre_padre_callback_column'));

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    } //end menu
    
    public function pais(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Pais');
            $crud->set_table('pais');

            $crud->set_relation('pais_estado_id', 'estado', 'estado_nombre');
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end pais
    
    public function perfil(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Perfil');
            $crud->set_table('perfil');

            $crud->set_relation('perfil_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('perfil_permiso_id', 'permiso', 'permiso_nombre');
            
            $crud->unset_add_fields('perfil_estado_id');
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end perfil
    
    public function proceso_envio(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Proceso Envio');
            $crud->set_table('proceso_envio');

            $crud->set_relation('proceso_envio_estado_id', 'estado', 'estado_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end region
    
    public function producto(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Producto');
            $crud->set_table('producto');
            
            $crud->order_by('producto_familia_id', 'producto_marca_id');

            $crud->columns('producto_nombre', 'producto_marca_id','producto_modelo', 'producto_familia_id', 'producto_precio', 'producto_stock', 'producto_estado_id');

            $crud->unset_fields('producto_estado_id','producto_stock');
            
            $crud->set_relation('producto_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('producto_familia_id', 'familia', 'familia_nombre');
            $crud->set_relation('producto_marca_id', 'marca', 'marca_nombre');
            
            $crud->display_as('producto_nombre', 'Nombre')
                    ->display_as('producto_garantia_meses', 'Garantia (mes)')
                    ->display_as('producto_peso', 'Peso (kg)')
                    ->display_as('producto_modelo', 'Modelo')
                    ->display_as('producto_familia_id', 'familia')
                    ->display_as('producto_precio', 'Precio USD')
                    ->display_as('producto_marca_id', 'Marca')
                    ->display_as('producto_stock', 'Stock')
                    ->display_as('producto_marca', 'Marca')
                    ->display_as('producto_estado_id', 'Estado');

            $crud->add_action('Photos', '', '','ui-icon-image',array($this,'redireccion_fotos'));

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end producto
    
    public function provincia(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Provincia');
            $crud->set_table('provincia');

            $crud->set_relation('provincia_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('provincia_region_id', 'region', 'region_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end provincia
    
    public function pass_cliente_md5_encript($post_array){
                
        $post_array['cliente_pass'] = md5($$post_array['cliente_pass']);

        return $post_array;
    }
    
    public function region(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Region');
            $crud->set_table('region');

            $crud->set_relation('region_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('region_pais_id', 'pais', 'pais_nombre');

            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end region
    
    public function stock(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Stock');
            $crud->set_table('stock');
            
            $crud->unset_add_fields('stock_estado_id');

            $crud->set_relation('stock_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('stock_producto_id', 'producto', 'producto_nombre');
            $crud->set_relation('stock_bodega_id', 'bodega', 'bodega_id');
//            $crud->set_relation_n_n('stock_bodega_id', 'bodega', 'sucursal', 'bodega_sucursal_id', 'bodega_sucursal_id', 'sucursal_nombre','bodega_id');

            $crud->callback_after_update(array($this, 'stock_callback_after'));
            $crud->callback_after_insert(array($this, 'stock_callback_after'));
            
            $output = $crud->render();
            
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end stock

    public function usuario(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Usuarios');
            $crud->set_table('usuario');

            $crud->columns('usuario_rut', 'usuario_dv', 'usuario_nombres', 'usuario_apPat', 'usuario_apMat', 'usuario_fecha_nacimiento', 'usuario_sucursal_id', 'usuario_perfil_id', 'usuario_estado_id');

            $crud->set_relation('usuario_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('usuario_sucursal_id', 'sucursal', 'sucursal_nombre');
            $crud->set_relation('usuario_perfil_id', 'perfil', 'perfil_nombre');
            
            $crud->display_as('usuario_rut', 'Rut')
                    ->display_as('usuario_dv', 'Dv')
                    ->display_as('usuario_nombres', 'Nombres')
                    ->display_as('usuario_apPat', 'Apellido Paterno')
                    ->display_as('usuario_apMat', 'Apellido Materno')
                    ->display_as('usuario_fecha_nacimiento', 'Fecha Nacimiento')
                    ->display_as('usuario_sucursal_id', 'Sucursal')
                    ->display_as('usuario_perfil_id', 'Perfil')
                    ->display_as('usuario_estado_id', 'Estado');


            $output = $crud->render();
            
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }// end usuario
    
    public function sucursal(){
        if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado

            $crud = new grocery_CRUD();
            $crud->set_subject('Sucursal');
            $crud->set_table('sucursal');
            
            $crud->columns('sucursal_nombre', 'sucursal_direccion','sucursal_comuna_id', 'sucursal_estado_id');

            $crud->set_relation('sucursal_estado_id', 'estado', 'estado_nombre');
            $crud->set_relation('sucursal_comuna_id', 'comuna', 'comuna_nombre');
            
            
            $crud->unset_add_fields('sucursal_estado_id','sucursal_google_map');
            $crud->unset_edit_fields('sucursal_google_map');
            
            $output = $crud->render();
            $this->salida($output);
        else:
            redirect("default_controller");
        endif;
    }//end sucursal
    
    public function call_back_foto_convert($value, $row){
        
            $foto = "data:image/jpeg;base64,".$value;
        
            return '<img src="'.$foto.'" alt="foto" style="height:40px;">';
    }
    
    public function foto_callback_before_insert($post_array){
        
       $foto = "assets/uploads/files/".$post_array['foto_data'];
       $imagedata = file_get_contents($foto);
       $base64 = base64_encode($imagedata);
       
       $post_array['foto_data'] = "$base64";
       unlink($foto);
       return $post_array;
    }
    
    /**
     *         
     *   $field_info = stdClass Object
      *  (
      *         [field_name] => file_url
      *        [upload_path] => assets/uploads/files
      *         [encrypted_field_name] => sd1e6fec1
      * )
      *
      * $files_to_upload = Array
      * (
      *         [sd1e6fec1] => Array
      *         (
      *                 [name] => 86.jpg
      *                 [type] => image/jpeg
      *                 [tmp_name] => C:\wamp\tmp\phpFC42.tmp
      *                 [error] => 0
      *                 [size] => 258177
      *         )
      * 
     * @param type $files_to_upload
     * @param type $field_info
     * @return string|boolean
     */
    public function imagen_callback_before_upload($files_to_upload, $field_info, $post_array){
        
        $id = $field_info->encrypted_field_name;
        
        $name = $files_to_upload[$id]['name'];
        $type = $files_to_upload[$id]['type'];
        $tmp_file = $files_to_upload["$id"]['tmp_name'];
        
        $imagedata = file_get_contents($tmp_file);
        $base64 = base64_encode($imagedata);
        $post_array['cliente_foto'] = $base64;
        if($type != 'image/jpeg'){
            return "Solo se permiten imagenes JPG|JPEG";
        }
        
        return TRUE;

    }//fin imagen_callback_before_upload
    
    /**
    * Examples of what the $uploader_response, $files_to_upload and $field_info will be:
    *   $uploader_response = Array
    *  (
    *      [0] => stdClass Object
    *          (
    *              [name] => 6d9c1-52.jpg
    *              [size] => 495375
    *              [type] => image/jpeg
    *              [url] => http://grocery_crud/assets/uploads/files/6d9c1-52.jpg
    *          )
    *   )
    *
    *   $field_info = stdClass Object
    *  (
    *          [field_name] => file_url
    *          [upload_path] => assets/uploads/files
    *          [encrypted_field_name] => sd1e6fec1
    *  )    
    *
    *   $files_to_upload = Array
    *   (
    *           [sd1e6fec1] => Array
    *           (
    *                   [name] => 86.jpg
    *                   [type] => image/jpeg
    *                   [tmp_name] => C:\wamp\tmp\phpFC42.tmp
    *                   [error] => 0
    *                   [size] => 258177
    *           )
    *   )
    */
    public function imagen_callback_after_upload($uploader_response,$field_info, $files_to_upload, $post_array){
        
       $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;
       
       $imagedata = file_get_contents($file_uploaded);
       $base64 = base64_encode($imagedata);

       $post_array['cliente_foto'] = "$base64";

       return $post_array;
       
    }
    
    public function imagen_callback_after_insert($post_array, $primary_key){
        $foto = "assets/uploads/files/".$post_array['cliente_foto'];
        if(!unlink($foto)) {
               return "$foto"; 
        }else{
               return TRUE; 
        }
    }
    
    public function imagen_callback_before_insert($post_array){
       
       $foto = "assets/uploads/files/".$post_array['cliente_foto'];
       $imagedata = file_get_contents($foto);
       $base64 = base64_encode($imagedata);
       
       $post_array['cliente_foto'] = "$base64";
       unlink($foto);
       return $post_array;
    }
   
    public function call_back_foto_field($value, $primary_key){
        $foto = "data:image/jpeg;base64,".$value;
        
        return '<img src="'.$foto.'" alt="foto" height="200"/><hr/><input type="file" name="cliente_foto" value="$value"/>';
    }
    
    public function call_back_foto_field_add(){
        
        return '<input type="file" name="cliente_foto" value="$value"/>';
    }
    
    public function link_familia_callback(){
        $cont = $this->db->count_all_results('familia');
        $cont2 = $cont+1;
        return '<input type="text" maxlength="50" value="familia/productos/'.$cont2.'" name="familia_link" style="width:462px;" readonly="readonly"/>';
    } 
 
    public function stock_callback_after($post_array){
        
        $stock = $post_array['stock_cantidad'];
        $id = $post_array['stock_producto_id'];

        $data = array(
            'producto_stock' => $stock
        );
        $this->db->update('producto',$data,array('producto_id' =>$id));

        return true;
    }
    
    
    public function redireccion_fotos($primary_key , $row){
        return site_url('mantenedor/foto/add/'.$primary_key);
    }
    
    public function nombre_padre_callback_column($value){
        
        $data = array(
            'categoria_menu_id'=>$value
        );
        $query = $this->db->get_where('categoria_menu', $data);
        $res = $query->result();
        print_r($res);
        return  "".$res[0]['categoria_menu_nombre'];
    }

}
