<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of control_sesion
 *
 * @author gmorel
 */
class Control_sesion extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('usuario_model');
        $this->load->model('perfil_model');
    }
    
    public function valida_form(){
        $this->form_validation->set_rules('rut', 'Rut', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[3]|max_length[8]|md5|xss_clean');
        
        $this->form_validation->set_message('required', 'Debe ingresar el campo %s.');
        $this->form_validation->set_message('min_length', 'La %s debe ser de al menos %s caracteres.');
        $this->form_validation->set_message('max_length', 'La %s debe ser de a lo maximo %s caracteres.');
        
        if ($this->form_validation->run() === FALSE):
            $this->redirection(FALSE);
        else: // si paso la validacion recibo los datos
            $rut = $this->input->post('rut'); $rut2 = explode("-", $rut); /*separo el rut por el guion*/
            $dv = $rut2[1]; /*guardo el Digito verificador del rut*/$rut3 = str_replace(".", "", $rut2[0]); /*quito los puntos del rut*/$pass = $this->input->post('pass'); //recibo el password del formulario

            if ($rut3 != '' && $dv != '' && $pass != ''){
                        $this->loggin($rut3, $dv, $pass); //llamo a la funcion loggin
            }

            if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado
                redirect("default_controller");
            else:
                $this->redirection(TRUE);
            endif;
        endif;
        return;
    }
    
    public function redirection($a){

        if(!$a){
            $this->load->view('template/header');
            $this->load->view('template/menu');
            $this->load->view('loggin'); //si falla la validacion regreso al formulario
            $this->load->view('template/footer');
        }else{
            $data['error'] = "Error al ingresar con usuario.";
            $this->load->view('template/header');
            $this->load->view('template/menu');
            $this->load->view('loggin', $data);
            $this->load->view('template/footer');
        }
    }

    public function valida_usuario() {
        if ($this->session->userdata('logged') === true)://si la variable de sesion logged está creada entro
            $this->logout();
        else:
            $this->valida_form();
        endif;
    }

    public function loggin($rut, $dv, $pass) {

        $res = $this->usuario_model->loggin($rut, $dv, $pass); //llamo al metodo para validar el usuario

        if ($res[0] == 1):

            $this->usuario_model->datos_usuario($rut, $dv); //llamo al metodo y traigo los datos del usuario
            $this->perfil_model->datos_perfil(1); // llamo al metodo y traigo los datos del perfil

            $this->session->set_userdata('usuario');
            $this->session->set_userdata('id', $this->usuario_model->getId());
            $this->session->set_userdata('nombres', $this->usuario_model->getNombres());
            $this->session->set_userdata('apPat', $this->usuario_model->getApPat());
            $this->session->set_userdata('apMat', $this->usuario_model->getApMat());
            $this->session->set_userdata('rut', $this->usuario_model->getRut());
            $this->session->set_userdata('dv', $this->usuario_model->getDv());
            $this->session->set_userdata('fechaNac', $this->usuario_model->getFechaNac());
            $this->session->set_userdata('fechaIngre', $this->usuario_model->getFechaIngre());
            $this->session->set_userdata('foto',$this->usuario_model->getFoto());
            $this->session->set_userdata('sucursalId', $this->usuario_model->getSucursalId());
            $this->session->set_userdata('perfilId', $this->usuario_model->getPerfilId());
            $this->session->set_userdata('cargoId', $this->usuario_model->getCargoId());
            $this->session->set_userdata('estadoId', $this->usuario_model->getEstadoId());
            $this->session->set_userdata('logged', $this->usuario_model->getLogged());
            $this->session->set_userdata('perfilNombre', $this->perfil_model->getNombre_perfil());
            return;

        else:
            return;
        endif;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('default_controller');
    }
    
    public function sign_up(){
        $this->form_validation->set_rules('rut', 'Rut', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[3]|max_length[8]|md5|xss_clean');
        
        $this->form_validation->set_message('required', 'Debe ingresar el campo %s.');
        $this->form_validation->set_message('min_length', 'La %s debe ser de al menos %s caracteres.');
        $this->form_validation->set_message('max_length', 'La %s debe ser de a lo maximo %s caracteres.');
        
        if ($this->form_validation->run() === FALSE):
            $this->redirection(FALSE);
        else: // si paso la validacion recibo los datos
            $rut = $this->input->post('rut'); $rut2 = explode("-", $rut); /*separo el rut por el guion*/
            $dv = $rut2[1]; /*guardo el Digito verificador del rut*/$rut3 = str_replace(".", "", $rut2[0]); /*quito los puntos del rut*/$pass = $this->input->post('pass'); //recibo el password del formulario

            if ($rut3 != '' && $dv != '' && $pass != ''){
                        $this->loggin($rut3, $dv, $pass); //llamo a la funcion loggin
            }

            if ($this->session->userdata('logged') === TRUE): //valido que el usuario se encuentre loggeado
                redirect("default_controller");
            else:
                $this->redirection(TRUE);
            endif;
        endif;
        return;
    }

}
