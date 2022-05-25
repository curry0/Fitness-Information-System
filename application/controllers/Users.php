<?php 
	class Users extends CI_Controller {

		//Register user
		public function register() {
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');

			}
			else {
				//Encrypt password
				$enc_password = md5($this->input->post('password'));
				$name = $this->input->post('name');
				//Upload the image
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					$user_image = 'noimage.jpg';
				}
				else {
					$data = array('upload_data' => $this->upload->data());

					$user_image = $_FILES['userfile']['name'];

				}
				
				$this->user_model->register($enc_password, $user_image);

				//Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('users/login');
			}
		}

		//Login user
		public function login() {
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');

			}
			else {
				//Get username
				$username = $this->input->post('username');
				
				//Get and encrypt password
				$password = md5($this->input->post('password'));
				
				//Login user
				$user_id = $this->user_model->login($username, $password);


				if($user_id) {

					//Create session
					$user_data = array(
						'user_id' => $user_id->id,
						'name' => $user_id->name,
						'nickname' => $user_id->nickname,
						'email' => $user_id->email,
						'username' =>$username,
						'register_date' => $user_id->register_date,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					//Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('posts');
				}
				else {
				//Set message
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('users/login');	
				}

			} 
		}

		//Logout user
		public function logout() {
			//Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

				//Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');

		}

		//Check if username exists
		public function check_username_exists($username) {
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a differenet one');
			if($this->user_model->check_username_exists($username)) {
				return true;
			}
			else {
				return false;
			}
		}

		//Check if email exists
		function check_email_exists($email) {
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a differenet one');
			if($this->user_model->check_email_exists($email)) {
				return true;
			}
			else {
				return false;
			}
		}


		 public function upload() {
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
		$data['title'] = "File Upload";
		$config['upload_path']          = './assets/images/users';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $this->load->library('upload', $config);
                $data['error'] = "";
                if ( ! $this->upload->do_upload('userfile'))
                {
                		if(isset($_FILES['userfile'])){
                        $data['error'] = $this->upload->display_errors();
                    	}
						$this->load->view('templates/header');
						$this->load->view('users/upload', $data);
						$this->load->view('templates/footer');
                }
                else
                {

           				$user_id = $this->session->userdata('user_id');

           				$user = $this->user_model->get_user($user_id);

           				if($user->user_image && file_exists('assets/images/users/'.$user->user_image)){
           					unlink('assets/images/users/'.$user->user_image); //unlinking the current image and replacing it with the other image uploaded.
           				}

                        $uploaddata = $this->upload->data();

                        $filename = $uploaddata['file_name'];
                        $userdata = array(
                        	'user_image' => $filename
                        );

                        $this->user_model->update($user_id, $userdata);
                        $this->session->set_flashdata('image_uploaded', "Upload Succesfully");
                        redirect('dashboard/index');
                } 
	        
	    }
	    public function changePassword(){
	    	if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = "Change Password";

			$this->form_validation->set_rules('oldpassword', 'old password', 'callback_password_check');
			$this->form_validation->set_rules('newpassword', 'new password', 'required');
			$this->form_validation->set_rules('passwordconfirm', 'confirm password', 'required|matches[newpassword]');

			if($this->form_validation->run() === FALSE) {


				$this->load->view('templates/header');
				$this->load->view('users/change_password', $data);
				$this->load->view('templates/footer');
		}
			else {
				$user_id = $this->session->userdata('user_id');

				$new_password = $this->input->post('newpassword');

				$this->user_model->update($user_id, array('password' => md5($new_password)));

				$this->session->set_flashdata('password_changed', "Your password has been successfully changed.");

				redirect('dashboard/index');


			}
			
	    }

	    public function password_check($oldpassword){
	    	$user_id = $this->session->userdata('user_id');
	    	$user = $this->user_model->get_user($user_id);

	    	if($user->password !== md5($oldpassword)) {
	    		$this->form_validation->set_message('password_check', 'The {field} does not match');
	    		return false;
	    	}

	    	return true;
	    }

	    public function edit() {
			//Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_user($user_id);


			if(empty($data['user'])){
				show_404();
			}

			$data['title'] = 'Edit Your Profile';
			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
		}

	    	public function update(){

			//Check login
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$this->user_model->update_profile();

			//Set message
			$this->session->set_flashdata('user_updated', 'Your profile has been updated');
			redirect('dashboard/index');
		}

		public function admin(){
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['title'] = 'Admin Page';
			$user_id = $this->session->userdata('user_id');

			$data['user'] = $this->user_model->get_user($user_id);


			$this->load->view('templates/header', $data);
			$this->load->view('users/admin', $data);
			$this->load->view('templates/footer', $data);
		}
}
		


	