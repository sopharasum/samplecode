<?php 
	class EncryptionDecryption_model extends CI_Model
	{
		public function insert($data)
		{
			$this->db->insert('sample_data1', $data);
		}

		public function fetch_data()
		{
			$this->db->select('*');
			$this->db->from('sample_data1');
			$this->db->join('country1','country=country_id');
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			return $query;
		}

		public function fetch_single_data($id)
		{
			$this->db->where('id', $id);
			return $this->db->get('sample_data1');
		}

		public function edit($id, $data)
		{
			$this->db->where('id', $id);
			$this->db->update('sample_data1', $data);
		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('sample_data1');
		}

		public function fetch_country()
		{
			return $this->db->get('country1');
		}
	}
?>