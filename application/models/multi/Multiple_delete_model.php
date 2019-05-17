<?php
	class Multiple_delete_model extends CI_Model
	{
		public function fetch_data()
		{
			$this->db->select('*');
			$this->db->from('tbl_employee');
			$this->db->order_by('id', 'DESC');
			return $this->db->get();
		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_employee');
		}
	}
?>