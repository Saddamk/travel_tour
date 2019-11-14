<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
* 
*/
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
// ---------------------------------------------------------------------------------
	public function create_data($table, $data)
	{
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
// -----------------------------------------------------------------------------------
	public function get_data($table, $where='')
	{
		$query = $this->db->get($table);
		return $query->result();
		if(!empty($where)){
			$this->db->where($where);
		}
	}
// -----------------------------------------------------------------------------------
	public function edit($table, $where='')
	{
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->row_array();
	}
// ------------------------------------------------------------------------------------
	public function search($query)
	{
		$q = $this->db->from('tbl_essays')
						->like('title', $query)
						->get();
		return $q->result();
	}
// ------------------------------------------------------------------------------------
	public function delete($table, $where='')
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
// ------------------------------------------------------------------------------------
	public function get_single($id)
	{
		$this->db->where('essay_id', $id);
		$qu = $this->db->get('tbl_essays');
		return $qu->row_array();
	}
}

?>