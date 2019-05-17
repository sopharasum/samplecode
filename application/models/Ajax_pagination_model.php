<?php
	class Ajax_pagination_model extends CI_Model
	{
		public function count_all()
		{
			$query = $this->db->get('country');
			return $query->num_rows();
		}

		public function fetch_details($limit, $start)
		{
			$output = '';
			$this->db->select('*');
			$this->db->from('country');
			$this->db->order_by('countryname','ASC');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			$output .= '
				<table class="table table-bordered">
					<tr>
						<th>Country Code</th>
						<th>Country Name</th>
						<th>Code</th>
					</tr>
			';
			foreach($query->result() as $row)
			{
				$output .= '
					<tr>
						<td>'.$row->countrycode.'</td>
						<td>'.$row->countryname.'</td>
						<td>'.$row->code.'</td>
					</tr>
				';
			}

			$output .= '</table>';
			return $output;
		}
	}
?>