<?php
	class Autocomplete extends CI_Controller
	{
		public function index()
		{
			$this->load->view('autocomplete');
		}

		public function fetch()
		{
			$this->load->model('autocomplete_model');
			echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
		}
	}
?>