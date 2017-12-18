<?php

/*
 * ***************************************************************
 * Script : Menu_qry.php
 * Version : 
 * Date : Dec 18, 2017 - 11:30:17 AM
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of Menu_qry
 *
 * @author pudyasto
 */
class Menu_qry extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function get_main_menu() {
        $this->db->where('lang',$this->session->userdata('lang'));
        $this->db->where('statmenu','1');
        $this->db->where('mainmenuid','0');
        $query = $this->db->get('menus');
        return $query->result_array();
    }
    
    public function get_sub_menu() {
        $this->db->where('lang',$this->session->userdata('lang'));
        $this->db->where('statmenu','1');
        $this->db->where('mainmenuid <>','0');
        $query = $this->db->get('menus');
        return $query->result_array();
    }
}
