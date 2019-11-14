<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = 'Home | Essays';
		$data['page'] = 'user/home';
		$this->load->view('user/includes/template', $data);
	}
}

?>