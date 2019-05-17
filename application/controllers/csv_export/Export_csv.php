<?php
	class Export_csv extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('csv_export/export_csv_model');
		}

		public function index()
		{
			$data['student_data'] = $this->export_csv_model->fetch_all();
			$this->load->view('csv_export/export_csv', $data);
		}

		public function export()
		{
			$file_name = 'student_details_on_'.date('Ymd').'.csv';
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$file_name");
			header("Content-Type: application/csv;");

			$student_data = $this->export_csv_model->fetch_all();
			$file = fopen('php://output','w');
			$header = array('Student Name','Student Phone');

			fputcsv($file, $header);

			foreach ($student_data->result_array() as $key => $value)
			{
				fputcsv($file, $value);	
			}
			fclose($file);
			exit;
		}
	}
?>