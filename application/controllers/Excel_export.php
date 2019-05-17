<?php
	class Excel_export extends CI_Controller
	{
		public function index()
		{
			$this->load->model('excel_export_model');
			$data['country_data'] = $this->excel_export_model->fetch_data();
			$data['title'] = 'Export Data to Excel in Codeigniter using PHPExcel';
			$this->load->view('excel_export', $data);
		}

		public function action()
		{
			$this->load->model('excel_export_model');
			$this->load->library('excel');

			$object = new PHPExcel();
			$object->setActiveSheetIndex(0);

			$table_columns = array('Country Code', 'Country Name', 'Code');

			$column = 0;

			foreach($table_columns as $field)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
				$column++;
			}

			$country_data = $this->excel_export_model->fetch_data();

			$excel_row = 2;

			foreach($country_data as $row)
			{
				$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->countrycode);
				$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->countryname);
				$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->code);
				$excel_row++;
			}

			$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Employee Data.xls"');
			$object_writer->save('php://output');
		}
	}
?>