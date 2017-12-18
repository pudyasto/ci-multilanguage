<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    protected $data;
    
    public function __construct(){
        parent::__construct();  
        $this->load->model('menu_qry');
        $this->data['main_menu'] = $this->menu_qry->get_main_menu();
        $this->data['sub_menu'] = $this->menu_qry->get_sub_menu();
    }
    
    public function set_language() {
        $lang = $this->input->post('lang');
        $this->session->set_userdata('lang',$lang);
        echo json_encode($lang);
    }
    
    public function index(){
        $this->_init_add();
        $this->load->view('welcome_message',$this->data);
    }

    private function _init_add() {
        $this->data["form"] = array(
            "language" => array(
                    'attr'        => array(
                        'id'    => 'language',
                        'class' => 'form-control',
                    ),
                    'data'     => array(
                        'id' => 'Bahasa Indonesia',
                        'en' => 'Inggris',
                    ),
                    'value'    => $this->session->userdata('lang'),
                    'name'     => 'language',
                    'required'    => '',
            ),
        );
    }
}
