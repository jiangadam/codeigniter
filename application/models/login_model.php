<?php
/**
 * Created by PhpStorm.
 * User: jiangyongzhong
 * Date: 15/3/5
 * Time: 下午11:53
 */

class Login_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    //注册用户
    public function add_user(){
        $data = array(
            'username' => $this->input->post('username'),
            'pwd' => $this->input->post('pwd'),
            'email' => $this->input->post('email')
        );

        return $this->db->insert('admin', $data);
    }

    //登录时获取登录用户的数据
    public function get_user($username = false, $pwd = false){
        if($username == false or $pwd == false){
            return false;
        }
        $query = $this->db->get_where('admin', array('username'=>$username, 'pwd'=>$pwd));
        return $query->row_array();
    }

}