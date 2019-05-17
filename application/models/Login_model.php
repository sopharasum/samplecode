<?php
	class Login_model extends CI_Model
	{
		public function can_login($email, $password)
		{
			$this->db->where('email', $email);
			$query = $this->db->get('codeigniter_register');

			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					if($row->is_email_verified == 'yes')
					{
						$store_password = $this->encrypt->decode($row->password);
						if($password == $store_password)
						{
							$this->session->set_userdata('id', $row->id);
							$this->session->set_userdata('name', $row->name);
						}
						else
						{
							return 'Wrong Password';
						}
					}
					else
					{
						return 'Plesae verify your email first before login';
					}
				}
			}
			else
			{
				return 'Wrong Email Address';
			}
		}	
	}
?>