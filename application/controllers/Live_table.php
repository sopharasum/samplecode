<?php
	class Live_table extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('live_table_model');
		}

		public function index()
		{
			$this->load->view('live_table');
		}

		public function load_data()
		{
			$data = $this->live_table_model->load_data();
			echo json_encode($data);
		}

		public function insert()
		{
			$data = array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
				'age'			=> $this->input->post('age')
			);

			$this->live_table_model->insert($data);
		}

		public function update()
		{
			$data = array(
				$this->input->post('table_column') => $this->input->post('value')
			);

			$this->live_table_model->update($data, $this->input->post('id'));
		}

		public function delete()
		{
			$this->live_table_model->delete($this->input->post('id'));
		}
	}
?>