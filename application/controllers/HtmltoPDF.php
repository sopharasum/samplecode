<?php
	class HtmltoPDF extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('htmltopdf_model');
			$this->load->library('pdf');
		}

		public function index()
		{
			$data['customer_data'] = $this->htmltopdf_model->fetch();
			$data['title'] = 'Convert HTML to PDF in CodeIgniter using Dompdf';
			$this->load->view('htmltopdf', $data);
		}

		public function details()
		{
			if($this->uri->segment(3))
			{
				$customer_id = $this->uri->segment(3);

				$data['customer_details'] = $this->htmltopdf_model->fetch_single_details($customer_id);
				$data['title'] = 'Convert HTML to PDF in CodeIgniter using Dompdf';
				$this->load->view('htmltopdf', $data);
			}
		}

		public function pdfdetails()
		{
			if($this->uri->segment(3))
			{
				$customer_id = $this->uri->segment(3);
				$html_content = '<h3 align="center">Convert HTML to PDF in Codeignter using DomPDF</h3>';
				$html_content .= $this->htmltopdf_model->fetch_single_details($customer_id);
				$this->pdf->loadHtml($html_content);
				$this->pdf->render();
				$this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
			}
		}
	}
?>