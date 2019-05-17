<?php
	class First extends CI_Controller
	{
		public function index()
		{
			$this->load->model('first_model');
			$data['fetch_data'] = $this->first_model->fetch_data();
			$data['fetch_province'] = $this->first_model->fetch_province();
			$this->load->view('first', $data);
		}

		public function form_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name', "First Name", 'required|alpha');
			$this->form_validation->set_rules('last_name', "Last Name", 'required|alpha');
			$this->form_validation->set_rules('gender', 'Gender', 'required|callback_check_default');
			$this->form_validation->set_message('check_default', 'Please select gender');

			if($this->form_validation->run())
			{
				//true
				$this->load->model("first_model");
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name')
				);

				if($this->input->post('update'))
				{
					$this->first_model->update_data($data, $this->input->post('hidden_id'));
					redirect (base_url().'index.php/first/updated');
				}
				elseif($this->input->post('insert'))
				{
					$this->first_model->insert_data($data);
					redirect(base_url()."index.php/first/inserted");
				}

				
			}
			else
			{
				//false
				$this->index();
			}
		}

		public function inserted()
		{
			$this->index();
		}

		public function delete_data()
		{
			$id = $this->uri->segment(3);
			$this->load->model('first_model');
			$this->first_model->delete_data($id);

			redirect(base_url()."index.php/first/deleted");
		}

		public function deleted()
		{
			$this->index();
		}

		public function update_data()
		{
			$user_id = $this->uri->segment(3);
			$this->load->model('first_model');
			$data['user_data'] = $this->first_model->fetch_single_data($user_id);
			$data['fetch_data'] = $this->first_model->fetch_data();
			$this->load->view('first', $data);
		}

		public function updated()
		{
			$this->index();
		}

		public function check_default($gender)
		{
			return $gender == '0' ? FALSE : TRUE;
		}

		public function login()
		{
			$this->load->view('login');
		}

		public function login_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('first_model');
				if($this->first_model->can_login($username, $password))
				{
					$session_data = array(
						'username' => $username,
					);
					$this->session->set_userdata($session_data);
					redirect (base_url().'index.php/first/enter');
				}
				else
				{
					$this->session->set_flashdata('error','Invalid username and/or password');
					redirect(base_url().'index.php/first/login');
				}
			}
			else
			{
				$this->login();
			}
		}

		public function enter()
		{
			if($this->session->userdata('username') != '')
			{
				echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
				echo '<a href="'.base_url().'index.php/first/logout">Logout</a>';
			}
			else
			{
				redirect(base_url().'index.php/first/login');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('username');
			redirect(base_url().'index.php/first/login');
		}

		public function getmax()
		{
			$dataset = array(12,23,42,43,5,75,1);
			$result = 0;
			foreach ($dataset as $key) {
				if($result > $key)
				{
					$result = $key;
				}
			}
			echo $result;
		}

		public function sortarray()
		{
			$array=array('2','4','8','5','1','7','6','9','10','3');
			echo "Unsorted array is: ";
			echo "<br />";
			print_r($array);


			for($j = 0; $j < count($array); $j ++) {
			    for($i = 0; $i < count($array)-1; $i ++){

			        if($array[$i] > $array[$i+1]) {
			            $temp = $array[$i+1];
			            $array[$i+1]=$array[$i];
			            $array[$i]=$temp;
			        }       
			    }
			}

			echo "<br/>Sorted Array is: ";
			echo "<br />";
			print_r($array);
		}

		public function email_availibility()
		{
			$data['title'] = 'Check Email Availibility with Codeigniter';
			$this->load->view('email',$data);
		}

		public function check_email_avalibility()
		{
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';
			}
			else
			{
				$this->load->model('first_model');
				if($this->first_model->is_email_available($_POST['email']))
				{
					echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';
				}
				else
				{
					echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';
				}
			}
		}
	}
?>