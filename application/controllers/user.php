<?php

class User extends My_Controller
{
	public function index()
	{
		$this->load->helper('form');
		// $this->load->helper('url');    //this helper metioned in $autoload['helper'] = array('url', 'html');
		$this->load->model('articlesmodel', 'articles');
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('user/index'),
			'per_page' => 10,
			'total_rows' => $this->articles->count_all_articles(),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'first_link_open' => "<li>",
			'first_link_close' => "</li>",
			'last_link_open' => "<li>",
			'last_link_close' => "</li>",
			'next_tag_open' => "<li>",
			'next_tag_close' => "</li>",
			'prev_tag_close' => "<li>",
			'prev_tag_close' => "</li>",
			'num_tag_close' => "<li>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a>",
			'cur_tag_close' => "</a></li>"
		];
		$this->pagination->initialize($config); // initialize pagination
		$articles = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));
		$this->load->view('public/articles_list.php', compact('articles')); //compact is a PHP function
	}
	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query', 'Search', 'required');
		// print_r($this->form_validation);
		if ($this->form_validation->run() == FALSE) {
			$this->index();
			// return $this->index();
		} else {
			$query = $this->input->post('query');

			return redirect("user/search_results/$query");
		}
		// print_r($query);
		// $this->load->model('articlesmodel', 'articles');
		// $articles =	$this->articles->search($query);
		// $this->load->view('public/search_results', compact('articles'));
	}

	public function search_results($query)
	{
		$this->load->helper('form');
		// print_r($query);

		// $this->load->helper('url');    //this helper metioned in $autoload['helper'] = array('url', 'html');
		$this->load->model('articlesmodel', 'articles');
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url("user/search_results/$query"),
			'per_page' => 10,
			'total_rows' => $this->articles->count_search_results($query),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'uri_segment' => 4,
			'first_link_open' => "<li>",
			'first_link_close' => "</li>",
			'last_link_open' => "<li>",
			'last_link_close' => "</li>",
			'next_tag_open' => "<li>",
			'next_tag_close' => "</li>",
			'prev_tag_close' => "<li>",
			'prev_tag_close' => "</li>",
			'num_tag_close' => "<li>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a>",
			'cur_tag_close' => "</a></li>"
		];
		$this->pagination->initialize($config); // initialize pagination	
		$articles = $this->articles->search($query, $config['per_page'], $this->uri->segment(4));
		$this->load->view('public/search_results', compact('articles'));
	}
	public function article($id)
	{
		$this->load->helper('form');
		$this->load->model('articlesmodel', 'articles');
		$article = $this->articles->find($id);
		$this->load->view('public/article_detail', compact('article'));
	}
	public function user_detils()
	{
		if ($this->session->userdata('user_id')) {
			$data = $this->session->userdata('user_id');
			$this->load->model('user_model');
			$user_data = $this->user_model->get_user_info($data);
			// $user_data = $this->user_model->get_user_info($data)[0];
			// echo "<pre>";
			// print_r($user_data);
			// echo "</pre>";
			// exit;
			$this->load->view('user_profile', compact('user_data'));
		} else {
			return redirect('login/admin_login');
		}
	}
	public function find_user($id)
	{
		// if ($this->session->userdata('user_id'))
		// 	$data = $this->session->userdata('user_id');
		$this->load->model('user_model');
		$user_data = $this->user_model->user_profile($id);
		// echo "<pre>";
		// print_r($user_data);
		// echo "</pre>";
		// exit;
		$this->load->model('registermodel');
		$country_list = $this->registermodel->loadCountry();
		foreach ($country_list as $country) {
			$countries[""] = 'Select Country';
			$countries[$country->id] = $country->countryname;
		}
		$this->load->view('edit_user', compact('countries', 'user_data'));
	}
	public function update_user()
	{
		// $post = $this->input->post();
		// echo '<pre>' . print_r($post) . '</pre>';
		// exit;
		// $this->load->library('upload');
		if ($this->session->userdata('user_id'))
			$id = $this->session->userdata('user_id');
		// $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
		// $this->form_validation->set_rules('uname', 'Email', 'trim|required|is_unique[users.uname]|valid_email');
		// $this->form_validation->set_rules('pword', 'Password', 'trim|required|min_length[8]');
		// $this->form_validation->set_rules('confirm_password', 'Password Conform', 'trim|required|matches[pword]');
		// $this->form_validation->set_rules('country', 'Country Name', 'required');
		// $this->form_validation->set_rules('state', 'State Name', 'callback_validate_selection');
		// // $this->form_validation->set_message('validate_selection', 'The State Name field is required.');
		// $this->form_validation->set_rules('city', 'City Name', 'callback_validate_selection');
		// $this->form_validation->set_rules('zip', 'ZipCode', 'required|numeric|min_length[6]|max_length[6]');
		// $this->form_validation->set_rules('gender', 'Gender', 'required');
		// // $this->form_validation->set_rules('file', 'File', 'required|max_size[5048]');

		$config = [
			'upload_path' => './uploads',
			'allowed_types' => 'jpg|jpeg|png|gif',
		];

		$this->load->library('upload', $config);
		$post = $this->input->post();
		// $this->upload->initialize($config); //We can also initialize config like this
		// if ($this->form_validation->run() == true && $this->upload->do_upload('file')) {
		if ($this->upload->do_upload('file')) {

			$data = $this->upload->data();
			$image_path = base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
			$post['file'] = $image_path;
		} else {
			$this->load->model('user_model');
			$path = $this->user_model->img_path($id);
			$image_path = $path->file;
			$post['file'] = $image_path;
		}


		unset($post['submit']); //to remove the submit from array 
		unset($post['confirm_password']); //to remove the Password confirmation from array 

		// echo "<pre>";
		// print_r($post);
		// exit;

		$this->load->model('user_model');
		$this->user_model->user_update($id, $post);
		// $this->load->view('public/admin_login');
		return redirect('user/user_detils');
		// } else {


		// echo "<pre>";
		// print_r($post);
		// exit;
		// // $data = $this->upload->data();
		// // echo validation_errors();
		// // exit;
		// $this->load->model('registermodel');
		// $country_list = $this->registermodel->loadCountry();

		// foreach ($country_list as $country) {
		// 	$countries[""] = 'Select Country';
		// 	$countries[$country->id] = $country->countryname;
		// }

		// $this->load->view('edit_user', compact('countries'));
		// echo "Register Failed";
		// }
	}
	public function editor()
	{
		$this->load->view('editor');
	}
}