<?php
class User extends CI_Controller
{
	public function index()
	{
		$this->load->model('data_model');
		$data = $this->data_model->get_menu();
		// $data_s = $this->data_model->get_submenu();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		$page_content = $data[0]->content;
		// $this->loadTitle();
		$this->load->view('public/home', compact('data', 'page_content'));
	}
	public function login()
	{
		if ($this->session->userdata('user_id')) //If user already login
		{
			return redirect('user/editor');
		} else {

			$this->load->view('admin/admin_login');
		}
	}

	public function admin_login()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		if ($this->form_validation->run() == true) {
			// if (isset($_POST['submit'])) {
			// 	$username = $_POST['username'];
			// 	$password = $_POST['password'];
			// 	echo $username;
			// 	echo $password;
			// }
			// echo "Success";
			$username = $this->input->post('username'); //used to get data from user through form 
			$password = $this->input->post('password');
			// echo "Username: $username and Password: $password";
			$this->load->model('loginmodel');
			$login_id = $this->loginmodel->login_valid($username, $password);
			if ($login_id) {
				//credential valid , login user.
				$this->session->set_userdata('user_id', $login_id);  //set_userdata() is a function of session
				echo $this->session->set_flashdata('msg', "You've successfully logged in..!");
				return redirect('user/editor');
				// echo "Password Matched";
			} else {
				//authentication failed.
				// echo "Pasword Not Matched";
				echo $this->session->set_flashdata('msg', 'Invalid username or password');
				return redirect('user/login');
			}
		} else {

			$this->load->view('admin/admin_login');
			// echo validation_errors(); 
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		echo $this->session->set_flashdata('msg', "You've successfully logged out");
		return redirect('user/login');
	}
	public function editor()
	{
		$this->load->view('editor');
	}
	public function home()
	{
		$this->load->view('public/home');
	}
	public function save_data()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('menu_name', 'Menu', 'required|min_length[2]|max_length[30]');
		if ($this->form_validation->run() == true) {
			$post = $this->input->post();
			unset($post['sumbit']); //to remove the submit from array 
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
			// exit;
			$this->load->model('data_model');
			if ($this->data_model->save_menu($post)) {
				echo $this->session->set_flashdata('msg', 'Menu Added Successfully...!');
				return redirect('user/editor');
			}
		} else {
			$this->load->view('editor');
		}
	}
	public function loadTitle()
	{
		$page_id = $this->input->get()['id'];
		$this->load->model('data_model');
		$data = $this->data_model->get_menu();
		// $random  = random_element($data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		$page_content = $data[0]->content;
		foreach ($data as $value) {
			if ($value->id === $page_id) {
				$page_content = $value->content;
				break;
			}
		}

		$this->load->view('public/home', compact('data', 'page_content'));
	}
	public function load_submenu()
	{
		$this->load->model('data_model');
		$value = $this->data_model->load_menu();
		foreach ($value as $data_value) {
			$data[""] = 'Select Menu';
			$data[$data_value->id] = $data_value->menu_name;
		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit;
		$this->load->view('subeditor', compact('data'));
	}
	public function add_submenu()
	{

		// if ($this->form_validation->run() == true) {
		$post = $this->input->post();
		unset($post['sumbit']);
		// echo "<pre>";
		// print_r($post);
		// echo "</pre>";
		// exit;
		$this->load->model('data_model');
		if ($this->data_model->add_submenu($post)) {
			echo $this->session->set_flashdata('msg', 'Sub-Menu Added Successfully...!');
			return redirect('user/load_submenu');
		}
		// } 
		// else {
		// 	$this->load->view('editor');
		// }
	}
	public function loadsubTitle()
	{
		// $this->load->helper('array');
		$page_id = $this->input->get()['id'];
		$this->load->model('data_model');
		$subdata = $this->data_model->get_submenu($page_id);
		$data = $this->data_model->get_menu();
		// $random  = random_element($data);
		// echo "<pre>";
		// print_r($subdata);
		// echo "</pre>";
		// exit;
		$page_content = "";
		foreach ($subdata as $value) {
			if ($value->id === $page_id) {
				$page_content = $value->scontent;
				break;
			}
		}

		$this->load->view('public/home', compact('data', 'page_content'));
	}
}