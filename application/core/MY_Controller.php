<?php

/* 
 * ***************************************************************
 * Script : MY_Controllers.php
 * Version : 
 * Date : Dec 18, 2017 - 9:42:51 AM
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

class MY_Controller extends CI_Controller{  
    public function __construct(){
        parent::__construct();  
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $this->lang_switcher();
    }
    
    protected function lang_switcher () {
    // Detect current language from URL and set it to session and changing default system language config
        if ($this->session->userdata('lang') == "id") {
            $lang = "indonesian";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'id');
        }else {
            $lang = "english";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'en');
        }    
        $this->lang->load(array('controls',
            'welcome_page',
            ));
    }
}
