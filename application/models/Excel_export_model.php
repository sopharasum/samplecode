<?php
	class Excel_export_model extends CI_Model
	{
		public function fetch_data()
		{
			$query = $this->db->get('country');
			return $query->result();
		}
	}
?>