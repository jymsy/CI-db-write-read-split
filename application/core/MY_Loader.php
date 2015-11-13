<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    public function db($return = true) {
        return $this->database('', $return);
    }

    public function database($params = '', $return = FALSE, $active_record = NULL)
    {
        $CI =& get_instance();
        if (class_exists('CI_DB') AND isset($CI->db) AND is_object($CI->db)) {
            return $return ? $CI->db : true;
        }
		//load config
		if (!defined('ENVIRONMENT') 
	        || !file_exists($config = APPPATH.'config/'.ENVIRONMENT.'/database.php')) {
		    if (!file_exists($config = APPPATH.'config/database.php')) {
			    return false;
			}
		}
		require($config);
		if(!isset($_master_slave_relation[$active_group]) || !isset($db[$active_group])){
			return false;
		}
		$master = [$active_group => $db[$active_group]];

		$slaves = $_master_slave_relation[$active_group];
		$number = count($slaves);
		if($number < 1){
			$params = $db[$active_group];
		} else {
			$rand = mt_rand(0,$number - 1);
			$params = $db[$slaves[$rand]];
		}
        if(file_exists(APPPATH.'core/database/DB.php')) {
            require_once(APPPATH.'core/database/DB.php');
        } else {
            require_once(BASEPATH.'database/DB.php');
        }
		$active_record = is_bool($active_record) ? $active_record : true;

        $CI->db =& DB($params, $active_record, $master, $active_group);
        if ($return === TRUE) {
            return $CI->db;
        }
        return true;
    }
}
/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */
