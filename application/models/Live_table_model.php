<?php
	class Live_table_model extends CI_Model
	{
		public function load_data()
		{
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('sample_data');
			return $query->result_array();
		}

		public function insert($data)
		{
			$this->db->insert('sample_data', $data);
		}

		public function update($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('sample_data', $data);
		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('sample_data');
		}
	}
?>