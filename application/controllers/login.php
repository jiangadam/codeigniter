<?php
/**
 * Created by PhpStorm.
 * User: jiangyongzhong
 * Date: 15/3/5
 * Time: 下午11:52
 * 登陆 退出 注册控制器
 */

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    //登陆
    public function index(){
        //判断是否登陆，已登录直接跳换到首页
        if($this->session->userdata('islogin')){
            redirect('blog/index');
        }

        //登录数据判断
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pwd', 'Pwd', 'required|md5');

        //登录数据通过验证
        if($this->form_validation->run() === true){
            $username = $this->input->post('username');
            $pwd = $this->input->post('pwd');
            $result = $this->login_model->get_user($username, $pwd);

            if($result){
                $userinfo = array(
                    'username'=>$result['username'],
                    'email'=>$result['email'],
                    'islogin'=>true
                );
                $this->session->set_userdata($userinfo);
                redirect('blog/index');
            }else{
                //登录失败
                $data['title'] = '登陆';
                $this->form_validation->set_message('username or pwd error!!');
                $this->load->view('templates/header', $data);
                $this->load->view('login/index');
                $this->load->view('templates/footer');
            }
        }else {
            $data['title'] = '登陆';
            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        }
    }

    //注册
    public function register(){

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[admin.username]');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('email', 'E-mail', 'required|email');
        if($this->form_validation->run() == FALSE){
            $data['title'] = "注册";

            $this->load->view('templates/header', $data);
            $this->load->view('login/register');
            $this->load->view('templates/footer');

        }else{
            $this->login_model->add_user();
            redirect('login/index');
        }
    }

    //退出
    public function loginout(){
//        var_dump($this->session->all_userdata());
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('pwd');
        $this->session->sess_destroy();
        redirect('login/index');
    }
}