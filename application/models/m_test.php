<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_test Extends CI_Model
{

    public $_table = 'cp_test';
    function __construct()
    {
        $this->load->database();
        parent::__construct();
    }

    public function lists(){

       $res =  $this->db->query('select * from cp_test')->result_array();

       var_dump($res);

    }
    public function add(){
        $arr = array('uname' =>rand(10,100));

       $this->db->insert('test',$arr);
        $id =  $this->db->insert_id();
       var_dump($id);
    }
    public function update(){
        $set=array('id' =>2);
        $where = array('uname' =>'updatename');
        $res = $this->db->update('test',$set,$where);
        var_dump($res);
    }
}
