<?php
	class Bootgrid extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('bootgrid/bootgrid_model');
		}

		public function index()
		{
			$this->load->view('bootgrid/bootgrid');
		}

		public function fetch_data()
		{
			$data = $this->bootgrid_model->make_query();
			$array = array();

			foreach($data as $row)
			{
				$array[] = $row;
			}

			$output = array(
				'current'		=> intval($_POST['current']),
				'rowCount'		=> 10,
				'total'			=> intval($this->bootgrid_model->count_all_data()),
				'rows'			=> $array
			);

			echo json_encode($output);
		}

		public function action()
		{
			if($this->input->post('operation'))
			{
				$data = array(
					'name'			=> $this->input->post('name'),
					'address'		=> $this->input->post('address'),
					'gender'		=> $this->input->post('gender'),
					'designation'	=> $this->input->post('designation'),
					'age'			=> $this->input->post('age')
				);

				if($this->input->post('operation') == 'Add')
				{
					$this->bootgrid_model->insert($data);
					echo 'Data Inserted';
				}
				elseif($this->input->post('operation') == 'Edit')
				{
					$this->bootgrid_model->update($data, $this->input->post('employee_id'));
					echo 'Data Updated';
				}
			}
		}

		public function fetch_single_data()
		{
			if($this->input->post('id'))
			{
				$data = $this->bootgrid_model->fetch_single_data($this->input->post('id'));

				foreach($data as $row)
				{
					$output['name'] = $row['name'];
					$output['address'] = $row['address'];
					$output['gender'] = $row['gender'];
					$output['designation'] = $row['designation'];
					$output['age'] = $row['age'];
				}

				echo json_encode($output);
			}
		}

		public function delete_data()
		{
			if($this->input->post('id'))
			{
				$this->bootgrid_model->delete($this->input->post('id'));
				echo 'Data Deleted';
			}
		}
	}
?>