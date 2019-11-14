<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
* 
*/
class User_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function get_data($table, $where='')
	{
		$this->db->insert($table);
		if($this->db->cubrid_affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
		if(!empty($where)){
			$this->db->where($where);
		}
	}
}

?>