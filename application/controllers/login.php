<?php
class Login extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('user_id'))   //If user already login
			return redirect('admin/dashboard');
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == true) {
			// if (isset($_POST['submit'])) {
			// 	$username = $_POST['username'];
			// 	$password = $_POST['password'];
			// 	echo $username;
			// 	echo $password;
			// }
			// echo "Success";
			$username = $this->input->post('username'); //this is used to get data from user through form 
			$password = $this->input->post('password');
			// echo "Username: $username and Password: $password";
			$this->load->model('loginmodel');
			$login_id = $this->loginmodel->login_valid($username, $password);
			if ($login_id) {
				//credential valid , login user.
				$this->session->set_userdata('user_id', $login_id);  //set_userdata() is a function session
				return redirect('admin/dashboard');
				// echo "Password Matched";
			} else {
				//authentication failed.
				// echo "Pasword Not Matched";
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				return redirect('login');
			}
		} else {
			$this->load->view('public/admin_login');
			// echo validation_errors(); 
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
	public function submit_register()
	{
		$this->load->view('public/admin_login');
	}
}
