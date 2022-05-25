<?php 
	class User_model extends CI_Model {
		public function register($enc_password, $user_image) {
			//User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'nickname'=> $this->input->post('nickname'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'user_image' => $user_image,
				'experience' => $this->input->post('experience'),
				'fav_exercise' => $this->input->post('fav_exercise')
			);

			//Insert user
			return $this->db->insert('users', $data);
		}

		public function login($username, $password) {
			//Validate
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row();
			}
			else {
				return false;
			}
		}
		//Check username exists
		public function check_username_exists($username) {
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())) {
				return true;
			}
			else {
				return false;
			}
		}

		//Check email exists
		public function check_email_exists($email) {
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())) {
				return true;
			}
			else {
				return false;
			}
		}

		public function get_user($user_id){
			$this->db->where('id', $user_id);
			$query = $this->db->get('users');
			return $query->row(); 
		}

		public function update($user_id, $userdata) {
			$this->db->where('id', $user_id);
			$this->db->update('users', $userdata);

			
		}

		public function update_profile() {
	

			$data = array(
				'name' => $this->input->post('name'),
				'nickname' => $this->input->post('nickname'),
				'email' => $this->input->post('email'),
				'experience' => $this->input->post('experience'),
				'fav_exercise' => $this->input->post('fav_exercise')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('users', $data);
		}

}