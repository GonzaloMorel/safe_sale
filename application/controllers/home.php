<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
        public function __construct() {
            parent::__construct();
            $this->load->model('menu_model');
            $this->load->model('familia_model');
            $this->load->model('usuario_model');
        }
        
	public function index() {
            $perfil = $this->session->userdata('perfil_id');
            if($this->session->userdata('perfil_id') == NULL){
                $perfil = 0;
            }
            $this->menu_model->datos_menu($perfil);
            
            $this->familia_model->menu_familias();
            $data['menu'] = $this->menu_model->getMenuConstruido();
            $data['categoria'] = $this->familia_model->getFamilia_construida();
            $data['contenido'] = 'home';
            $data['data'] = array();
            
            $this->load->view('template/template', $data);
        }
        
        public function prueba(){
            $this->menu_model->datos_menu($this->session->userdata('perfilId'));
            $data['menu'] = $this->menu_model->getMenuConstruido();
            $data['contenido'] = 'prueba';
            $data['data'] = array();
            
            $this->load->view('template/template', $data);
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */