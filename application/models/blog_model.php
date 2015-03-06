<?php
/**
 * Created by PhpStorm.
 * User: jiangyongzhong
 * Date: 15/3/4
 * Time: 下午2:25
 */

class Blog_model extends CI_Model{
    //构造函数，载入数据库
    public function __construct(){
        $this->load->database();
    }
    //读取博客内容
    public function get_blog($id=0){
        if($id == false){
            $query = $this->db->get('blog');
            return $query->result_array();
        }else{
            $query = $this->db->get_where('blog', array('id'=>$id));
            return $query->row_array();
        }
    }
    //博客点击量＋1
    public function jiayi($id=0, $hot){
        if($id != false){
            $data = array('hot'=>$hot+1);
            $this->db->where('id',$id);
            $this->db->update('blog', $data);
        }
    }
}