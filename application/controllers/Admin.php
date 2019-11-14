<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
* 
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if(!$this->session->userdata('user_id')){
			redirect('Login');
		}
	}
// -----------------------------------------------------------------------------------
	public function index()
	{
		$data['essays'] = $this->Admin_model->get_data('tbl_essays');
		$data['title'] = "Home | Essays";
		$data['content'] = 'admin/dashboard';
		$this->load->view('admin/includes/template', $data);
	}
// --------------------------------------------------------------------------------
	public function create()
	{
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
			);
		// echo "<pre>";
		// var_dump($data); exit;
		$this->session->set_flashdata('success', 'Essay has been upload successfully!');
		$this->Admin_model->create_data('tbl_essays', $data);
		redirect('Admin');
	}
// --------------------------------------------------------------------------------
	// Get all users for admin to display
	public function all_users()
	{
		$data['users'] = $this->Admin_model->get_data('users');
		$data['essays'] = $this->Admin_model->get_data('tbl_essays'); 
		$data['title'] = 'All Users | Idea';
		$data['content'] = 'admin/users';
		$this->load->view('admin/includes/template', $data);
	}
// ------------------------------------------------------------------------------------
	// Get single user for admin to display
	public function get_single($id)
	{
		$data['single'] = $this->Admin_model->get_data('users', array('id'=>$id));
		$data['title'] = 'User Info | Idea';
		$data['content'] = 'admin/singleUser';
		$this->load->view('admin/includes/template', $data);
	}
// -------------------------------------------------------------------------------------
	// Search for data in the database...
	public function search()
	{
		$query = $this->input->post('query');
		$data['results'] = $this->Admin_model->search($query);
		$data['query'] = $query;
		$data['title'] = 'Search Results | Idea';
		$data['content'] = 'admin/search_results';
		$this->load->view('admin/includes/template', $data);
	}
	// Delete records from database... 
	public function delete($id)
	{
		$this->Admin_model->delete('users', array('id'=>$id));
		redirect('Admin');
	}
	// See all essays on a single page ... 
	public function see_all()
	{
		$this->load->library('pagination');
		$config = [
			'base_url' 			=> base_url('Admin/see_all'),
			'per_page' 			=> 3,
			'num_links'			=> 10,
			'total_rows'		=> $this->db->get('tbl_essays')->num_rows(),
			'full_tag_open' 	=> "<ul class='pagination'>",
			'full_tag_close'	=> "</ul>",
			'first_link' 		=> "First",
			'first_tag_open'	=> "<div>",
			'first_tag_close' 	=> "</div>",
			'last_link' 		=> "Last",
			'last_tag_open' 	=> "<div>",
			'last_tag_close' 	=> "</div>",
			'first_tag_open'	=> "<li>",
			'first_tag_close'	=> "</li>",
			'last_tag_open' 	=> "<li>",
			'last_tag_close' 	=> "</li>",
			'next_tag_open'		=> "<li>",
			'next_tag_close' 	=> "</li>",
			'prev_tag_open' 	=> "<li>",
			'prev_tag_close' 	=> "</li>",
			'num_tag_open' 		=> "<li>",
			'num_tag_close' 	=> "</li>",
			'cur_tag_open'		=> "<li class='active'><a href='#'>",
			'cur_tag_close' 	=> "<span class='sr-only'></span></a></li>"
		];
		$this->pagination->initialize($config);
		$data['all_essays'] = $this->db->get('tbl_essays', $config['per_page'], $this->uri->segment(3))->result();
		$data['title'] = 'All Essays | Idea';
		$data['content'] = 'admin/all_essays';
		$this->load->view('admin/includes/template', $data); 
	}
	// Getting single record...
	public function single_essay($id)
	{
		$data['single_ess'] = $this->Admin_model->get_single($id);
		$data['title'] = 'Essay Detail | Idea';
		$data['content'] = 'admin/single_essay';
		$this->load->view('admin/includes/template', $data);
	}
}

?>