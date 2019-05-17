<?php
	class Export_csv_model extends CI_Model
	{
		public function fetch_all()
		{
			$this->db->select('student_name,student_phone');
			$this->db->from('tbl_student');
			return $this->db->get();
		}
	}
?>