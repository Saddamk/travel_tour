<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','',TRUE);
		$this->load->library('session');
	}
	// Load the login view ...
	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('admin/login', $data);
	}
	// Logging the user in ...
	public function admin_login()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_message('valid_email', 'Enter a Valid email!');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()) {
			// validation passes, log the user in !

			$email= $this->input->post('email');
			$password = sha1($this->input->post('password'));

			$login = $this->Login_model->login_valid($email, $password);
			if ($login) {
				// Setting up the session for user through the ID... 
			      //$this->session->set_userdata('user', $login);
				// if Email and password matches, it'll allow you to the admin panel to add, edit or delete essaays... 
			      $this->session->set_userdata('user_id', $login);
			      redirect('Admin');
			} else {
				// If validation fails, redirect the user back to the login page and display the message ! 
				$this->session->set_flashdata('login_failed','Username or password incorrect, try correct and try again!');
				return redirect ('login');
			}
		} else {
			$data['title'] = 'Login | Failed';
			$this->load->view('admin/login', $data);
		}
	}
	// Sign up new user ...
	public function signup()
	{
		$data['title'] = 'Signup | Idea';
		$this->load->view('admin/signup', $data);
	}
	// Send the user's data to the database so that later can LOGIN...
	public function register_user()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('confPass', 'Password', 'required');
		if($this->form_validation->run() == TRUE){
		$data = array(
			'name' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password'))
			);
		$this->session->set_flashdata('success', 'Account created successfully, Login!');
		$this->Login_model->register($data);
		redirect('Login');
		}else{
			$data['title'] = 'Signup | Failed';
			$this->load->view('admin/signup', $data);
		}
	}
	// Log the user out ! 
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect('login');
	}
	// Admin profile ...
	public function profile($user_id)
	{
		$data['admin_bio'] = $this->Login_model->admin_profile($user_id);
		$data['title'] = 'Profile';
		$data['content'] = 'admin/profile';
		$this->load->view('admin/includes/template', $data);
	}

	// Load the view for changing password ...

	public function change_password($user_id)
	{
		$data['detail'] = $this->Login_model->admin_profile($user_id);
		$data['title'] = 'Change Password';
		$data['content'] = 'admin/modify_pword';
		$this->load->view('admin/includes/template', $data);
	}
	// Change password script ...
	public function change_pword()
	{
	    $pass=$this->input->post('old_password');
	    $npass=$this->input->post('new_password');
	    $rpass=$this->input->post('conf_password');
	    if($npass!=$rpass){
	        return "false";
	    }else{
	        $this->db->select('*');
	        $this->db->from('users');
	        $this->db->where('user_id',$this->session->userdata('user_id'));
	        $this->db->where('password', sha1($pass));
	        $query = $this->db->get();
	        if($query->num_rows()==1){
	            $data = array(
	                           'password' => sha1($npass)
	                        );
	            $this->db->where('user_id', $this->session->userdata('user_id'));
	            $this->session->set_flashdata('success', 'Password has been changed successfully!');
	            $this->db->update('users', $data); 
	        }else{
	            return "false";
	        }
	    }
	    redirect('Login/profile/' . $this->session->userdata('user_id'));

	}
}
?>