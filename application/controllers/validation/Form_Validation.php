<?php
	class Form_validation extends CI_Controller
	{
		public function index()
		{
			$this->load->view('validation/validation');
		}

		public function validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');

			if($this->form_validation->run())
			{
				$array = array(
					'success'		=> '<div class="alert alert-success">Thank you for contact Us</div>'
				);
			}
			else
			{
				$array = array(
					'error'			=> true,
					'name_error'	=> form_error('name'),
					'email_error'	=> form_error('email'),
					'subject_error'	=> form_error('subject'),
					'message_error'	=> form_error('message')
				);
			}

			echo json_encode($array);
		}
	}
?>