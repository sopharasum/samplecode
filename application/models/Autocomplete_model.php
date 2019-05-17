<?php
	class Autocomplete_model extends CI_Model
	{
		public function fetch_data($query)
		{
			$this->db->like('student_name', $query);
			$query = $this->db->get('tbl_student');

			if($query->num_rows() > 0)
			{
				foreach($query->result_array() as $row)
				{
					$output[] = array(
						'name'		=> $row['student_name'],
						'image'		=> $row['image']
					);
				}

				echo json_encode($output);
			}
		}
	}
?>