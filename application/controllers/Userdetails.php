<?php
	class Userdetails extends CI_Controller
	{
		public function index()
		{
			$this->load->library('user_agent');

			$data['browser'] = $this->agent->browser();
			$data['browser_version'] = $this->agent->version();
			$data['os'] = $this->agent->platform();
			$data['ip_address'] = $this->input->ip_address();

			$this->load->view('user_details', $data);
		}
	}
?>