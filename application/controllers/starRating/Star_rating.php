<?php
	class Star_rating extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('starRating/star_rating_model');
		}

		public function index()
		{
			$this->load->view('starRating/star_rating');
		}

		public function fetch()
		{
			$this->star_rating_model->html_output();
		}

		public function insert()
		{
			if($this->input->post('business_id'))
			{
				$data = array(
					'business_id'	=> $this->input->post('business_id'),
					'rating'		=> $this->input->post('index')
				);

				$this->star_rating_model->insert_rating($data);
			}
		}
	}
?>