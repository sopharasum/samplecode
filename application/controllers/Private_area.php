<?php
	class Private_area extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('id'))
			{
				redirect('login');
			}
		}

		public function index()
		{
			echo '<h2 align="center">Welcome '.$this->session->userdata('name').'</h2>';
			echo '<p align="center"><a href="'.base_url().'private_area/logout">Logout</a></p>';
		}

		public function logout()
		{
			$data = $this->session->all_userdata();
			foreach($data as $row => $rows_value)
			{
				$this->session->unset_userdata($row);
				redirect('login');
			}
		}
	}
?>