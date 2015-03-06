<?php
/**
 * Created by PhpStorm.
 * User: jiangyongzhong
 * Date: 15/3/4
 * Time: 下午2:15
 */

class Blog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
    }
    //博客首页
    public function index(){

        $data['blog'] = $this->blog_model->get_blog();
        $data['title'] = '所有博客';
        $this->load->view('templates/header', $data);
        $this->load->view('blog/index');
        $this->load->view('templates/footer');
    }
    //显示一条博客内容
    public function view(){
        $id = $this->uri->segment(3);

        $data['blog'] = $this->blog_model->get_blog($id);
        $data['title'] = $data['blog']['title'];

        //点击量增加1
        $this->blog_model->jiayi($id, $data['blog']['hot']);

        $this->load->view('templates/header', $data);
        $this->load->view('blog/view');
        $this->load->view('templates/footer');
    }
}