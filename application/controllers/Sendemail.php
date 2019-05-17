<?php
	class Sendemail extends CI_Controller
	{
		function index()
		{
			$data['title'] = 'How to Send an Email with Attachment in Codeigniter';
			$this->load->view('sendemail', $data);
		}

		public function send()
		{
			$name = $this->input->post('name');
			$programming_language = $this->input->post('programming_languages');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$experience = $this->input->post('experience');
			$mobile = $this->input->post('mobile');
			$additional_information = $this->input->post('additional_information');


			$subject = 'Application for Programmer Registration By - '.$name;
			$programming_languages = implode(', ', $programming_language);
			$file_data = $this->upload_file();

			if(is_array($file_data))
			{
				$message = '
					<h3 align="center">Programmer Details</h3>
					<table border="1" width="100%" cellspacing="5">
						<tr>
							<td width="30%">Name</td>
							<td width="70%">'.$name.'</td>
						</tr>
						<tr>
							<td width="30%">Address</td>
							<td width="70%">'.$address.'</td>
						</tr>
						<tr>
							<td width="30%">Email Address</td>
							<td width="70%">'.$email.'</td>
						</tr>
						<tr>
							<td width="30%">Programming Languages</td>
							<td width="70%">'.$programming_languages.'</td>
						</tr>
						<tr>
							<td width="30%">Programming Languages</td>
							<td width="70%">'.$experience.'</td>
						</tr>
						<tr>
							<td width="30%">Mobile Number</td>
							<td width="70%">'.$mobile.'</td>
						</tr>
						<tr>
							<td width="30%">Additional Information</td>
							<td width="70%">'.$additional_information.'</td>
						</tr>
					</table>
				';

				$config = array(
					'protocol'		=> 'smtp',
					'smtp_host'		=> 'ssl://smtp.gmail.com',
					'smtp_port'		=> 587,
					'smtp_user'		=> 'mail.sophara@gmail.com',
					'smtp_pass'		=> 'PharaLoveSreymom',
					'mailtype'		=> 'html',
					'charset'		=> 'iso-8859-1',
					'wordwrap'		=> TRUE
				);

				$this->load->library('email', $config);
				$this->email->set_newline('\r\n');
				$this->email->from($email);
				$this->email->to('sophara1995boy@gmail.com');
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->attach($file_data['full_path']);

				if($this->email->send())
				{
					if(delete_files($file_data['file_path']))
					{
						$this->session->set_flashdata('message', 'Application Sended');
						redirect('sendemail');
					}
				}
				else
				{
					if(delete_files($file_data['file_path']))
			        {
			        	$this->session->set_flashdata('message', 'There is an error in sending email');
			        	redirect('sendemail');
			        }
				}
			}
			else
			{
				$this->session->set_flashdata('message', 'There is an error in attach file');
				redirect('sendemail');
			}
		}

		public function upload_file()
		{
			$config['upload_path'] = 'upload/resume/';
			$config['allowed_types'] = 'doc|docx|pdf';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('resume'))
			{
				return $this->upload->data();
			}
			else
			{
				return $this->upload->display_errors();
			}
		}
	}
?>