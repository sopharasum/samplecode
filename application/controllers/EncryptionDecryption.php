<?php
	class EncryptionDecryption extends CI_Controller
	{
		public function index()
		{
			$this->load->model('encryptiondecryption_model');
			$this->load->library('encrypt');

			$data['data'] = $this->encryptiondecryption_model->fetch_data();
			$this->load->view('encryptiondecryption', $data);
		}

		public function insert()
		{
			$this->load->model('encryptiondecryption_model');			
			$data['country'] = $this->encryptiondecryption_model->fetch_country();
			$this->load->view('insert_data', $data);
		}

		public function insert_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('age', 'Age', 'required|numeric|trim');
			$this->form_validation->set_rules('gender', 'Gender', 'required|trim');

			if($this->form_validation->run() == false)
			{
				$this->insert();
			}
			else
			{
				$this->load->library('encrypt');
				$data = array(
					'first_name'	=> $this->encrypt->encode($this->input->post('first_name')),
					'last_name'		=> $this->encrypt->encode($this->input->post('last_name')),
					'age'			=> $this->encrypt->encode($this->input->post('age')),
					'country'		=> $this->input->post('country'),
					'gender'		=> $this->encrypt->encode($this->input->post('gender'))
				);

				$this->load->model('encryptiondecryption_model');
				$this->encryptiondecryption_model->insert($data);
				$this->session->set_flashdata('action', 'Data Inserted');

				redirect('encryptiondecryption');
			}
		}

		public function edit()
		{
			$this->load->library('encrypt');
			$this->load->model('encryptiondecryption_model');

			$data['country'] = $this->encryptiondecryption_model->fetch_country();
			$data['data'] = $this->encryptiondecryption_model->fetch_single_data($this->uri->segment(3));

			$this->load->view('edit_data', $data);
		}

		public function edit_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
			$this->form_validation->set_rules('age', 'Age', 'required|numeric|trim');
			$this->form_validation->set_rules('gender', 'Gender', 'required|trim');

			if($this->form_validation->run() == false)
			{
				$this->edit();
			}
			else
			{
				$this->load->library('encrypt');
				$data = array(
					'first_name'	=> $this->encrypt->encode($this->input->post('first_name')),
					'last_name'		=> $this->encrypt->encode($this->input->post('last_name')),
					'age'			=> $this->encrypt->encode($this->input->post('age')),
					'country'		=> $this->input->post('country'),
					'gender'		=> $this->encrypt->encode($this->input->post('gender'))
				);

				$this->load->model('encryptiondecryption_model');
				$this->encryptiondecryption_model->edit($this->input->post('hidden_id'), $data);
				$this->session->set_flashdata('action', 'Data Updated');

				redirect('encryptiondecryption');
			}
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->load->model('encryptiondecryption_model');
			$this->encryptiondecryption_model->delete($id);
			$this->session->set_flashdata('action', 'Data Deleted');

			redirect('encryptiondecryption');
		}
	}
?>