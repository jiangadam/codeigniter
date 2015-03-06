<?php

class Pages extends CI_Controller{
	public function view($page = 'home'){
        $data['title'] = $page;
        $data['list'] = array(
            array('id'=>1,'user'=>'zhangsan','age'=>20),
            array('id'=>2,'user'=>'lisi','age'=>21),
            array('id'=>3,'user'=>'wangwu','age'=>22),
        );
        $this->load->vars($data);
        $this->load->view('templates/header');
        $this->load->view('pages/view');
        $this->load->view('templates/footer');
    }
}