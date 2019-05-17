<?php
	class Csv_import extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('csv_import_model');
			$this->load->library('csvimport');
		}

		public function index()
		{
			$data['title'] = 'How to Import CSV Data into Mysql using Codeigniter';
			$this->load->view('csv_import', $data);
		}

		public function load_data()
		{
			$result = $this->csv_import_model->select();
			$output = '
				<h3 align="center">Imported User Details from CSV File</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Sr. No</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Email Address</th>
						</tr>
			';

			$count = 0;
			if($result->num_rows() > 0)
			{
				foreach($result->result() as $row)
				{
					$count = $count + 1;
					$output .= '
						<tr>
							<td>'.$count.'</td>
							<td>'.$row->first_name.'</td>
							<td>'.$row->last_name.'</td>
							<td>'.$row->phone.'</td>
							<td>'.$row->email.'</td>
						</tr>
					';
				}
			}
			else
			{
				$output .= '
						<tr>
							<td colspan="5" align="center">Data Not Available</td>
						</tr>
				';
			}

			$output .= '</table></div>';
			echo $output;
		}

		public function import()
		{
			$file_data = $this->csvimport->get_array($_FILES['csv_file']['tmp_name']);
			foreach($file_data as $row)
			{
				$data[] = array(
					'first_name'	=> $row['First Name'],
					'last_name'		=> $row['Last Name'],
					'phone'			=> $row['Phone'],
					'email'			=> $row['Email']
				);
			}

			$this->csv_import_model->insert($data);
		}
	}
?>