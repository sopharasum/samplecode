<?php
	class First_model extends CI_Model
	{
		public function welcome(){
			echo 'Welcome to my page';
		}

		public function insert_data($data)
		{
			$this->db->insert("tbl_user", $data);
		}

		public function fetch_data()
		{
			$query = $this->db->get("tbl_user");
			return $query;
		}

		public function delete_data($id)
		{
			$this->db->where("id",$id);
			$this->db->delete("tbl_user");
		}

		public function fetch_single_data($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get("tbl_user");
			return $query;
		}

		public function update_data($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('tbl_user', $data);
		}

		public function fetch_province()
		{
			$query = $this->db->get('tbl_province');
			return $query;
		}

		public function can_login($username, $password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('users');

			if($query->num_rows() > 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		public function is_email_available($email)
		{
			$this->db->where('email', $email);
			$query = $this->db->get('register');
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>