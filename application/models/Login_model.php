<?php 
 class Login_model extends CI_Model {
 	public function login_valid ($email, $password)
 	{
 		$query = $this->db->where(['email'=>$email, 'password'=>$password])
 						  ->get('users');
 		if( $query->num_rows() ) {
 		return $query->row()->id;
 	 }else{
 	 	return FALSE;
 	 }
 	}
 	public function register($data)
 	{
 		$this->db->insert('users', $data);
 		if($this->db->affected_rows() > 0 ){
 			return TRUE;
 		}else{
 			return FALSE;
 		}
 	}
 }

?>