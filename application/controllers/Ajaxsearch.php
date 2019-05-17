<?php
	class Ajaxsearch extends CI_Controller
	{
		public function index()
		{
			$data['title'] = 'Live Data Search in Codeigniter using Ajax JQuery';
			$this->load->view('ajaxsearch', $data);
		}

		public function fetch()
		{
			$output = '';
			$query = '';
			$this->load->model('ajaxsearch_model');
			if($this->input->post('query'))
			{
				$query = $this->input->post('query');
			}
			$data = $this->ajaxsearch_model->fetch_data($query);
			$output .= '
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Customer Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Postal Code</th>
							<th>Country</th>
						</tr>
			';
			if($data->num_rows() > 0)
			{
				foreach ($data->result() as $row) {
					$output .= '
						<tr>
							<td>'.$row->CustomerName.'</td>
							<td>'.$row->Address.'</td>
							<td>'.$row->City.'</td>
							<td>'.$row->PostalCode.'</td>
							<td>'.$row->Country.'</td>
						</tr>
					';
				}
			}
			else
			{
				$output .= '<tr>
								<td colspan="5">No Data Found !! </td>
							</tr>';
			}			
			$output .= '</table>
				</div>
			';

			echo $output;
		}
	}
?>