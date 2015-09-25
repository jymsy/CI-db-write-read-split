<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        //$this->load->database();
		$this->load->model(array('m_test'));
        $this->output->enable_profiler(true);
    }

    public function index(){
    	$this->m_test->lists();
    }
   public function add(){
   	 $id =  $this->m_test->add();
   }
   public function edit(){
   	echo $this->m_test->update();
   }

    public function loadOther(){

        $this->load->database('common');

        $comm_db = $this->load->database('common',TRUE);

        $res = $comm_db->query('select * from cp_brand')->result();

        print_r($res);

    }
}