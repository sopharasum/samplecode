<?php
	class Bootgrid_model extends CI_Model
	{
		var $records_per_page = 5;
		var $start_from = 0;
		var $current_page_number = 1;

		public function make_query()
		{
			if(isset($_POST['rowCount']))
			{
				$this->records_per_page = $_POST['rowCount'];
			}
			else
			{
				$this->records_per_page = 10;
			}

			if(isset($_POST['current']))
			{
				$this->current_page_number = $_POST['current'];
			}

			$this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
			$this->db->select('*');
			$this->db->from('tbl_employee');

			if(!empty($_POST['searchPhrase']))
			{
				$this->db->like('name', $_POST['searchPhrase']);
				$this->db->or_like('address', $_POST['searchPhrase']);
				$this->db->or_like('gender', $_POST['searchPhrase']);
				$this->db->or_like('designation', $_POST['searchPhrase']);
				$this->db->or_like('age', $_POST['searchPhrase']);
			}

			if(isset($_POST['sort']) && is_array($_POST['sort']))
			{
				foreach ($_POST['sort'] as $key => $value)
				{
					$this->db->order_by($key, $value);
				}
			}
			else
			{
				$this->db->order_by('id', 'DESC');
			}

			if($this->records_per_page != -1)
			{
				$this->db->limit($this->records_per_page, $this->start_from);
			}

			$query = $this->db->get();
			return $query->result_array();

		}

		public function count_all_data()
		{
			$this->db->select('*');
			$this->db->from('tbl_employee');
			$query = $this->db->get();

			return $query->num_rows();
		}

		public function insert($data)
		{
			$this->db->insert('tbl_employee', $data);
		}

		public function fetch_single_data($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('tbl_employee');

			return $query->result_array();
		}

		public function update($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_employee', $data);
		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('tbl_employee');
		}
	}
?>