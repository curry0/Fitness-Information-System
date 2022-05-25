<?php 
	class Dashboard extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->logged_in();
			$this->load->model('user_model');
		}
		
		private function logged_in() {
			if (!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
		}


		public function index() {
			$data['title'] = 'Profile';
			$user_id = $this->session->userdata('user_id');

			$data['user'] = $this->user_model->get_user($user_id);


			$this->load->view('templates/header', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer', $data);
		}
/*
			public function index() {

			$this->load->model('user_model');
			$data['fetch_data'] = $this->user_model->fetch_data();
			$this->load->view('templates/header', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer', $data);

*/

	

	}