<?php
		class Student_model extends CI_Model
		{

		public function show()
		{

		  $this->db->select('*')->from('student');
		  $r=$this->db->get();
		  $sq=$r->result();
		  return $sq;
		}
		public function lists()
		{
			$this->db->select('*');
			$this->db->from('student');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function record($std_id) 
		{
			$this->db->select();
			$this->db->from('student');
			$this->db->where('std_id', $std_id);
			$query = $this->db->get();
			return $query->row_array();
		}
		public function insert()
		{

		}
		public function update()
		{

		}
		public function delete($id){
			$this->db->where('std_id',$id);
			$this->db->delete('student');
			return $this->db->affected_rows();
		}
		}

 ?>
