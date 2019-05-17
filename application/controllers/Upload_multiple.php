<?php
	class Upload_multiple extends CI_Controller
	{
		public function index()
		{
			$data['title'] = 'Upload Multiple File with Ajax';
			$this->load->view('upload_multiple', $data);
		}

		public function upload()
		{
			if($_FILES['files']['name'] != '')
			{
				$output = '';
				$config['upload_path'] = './upload/multi/';
				$config['allowed_types'] = 'gif|png|jpg';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				for($count = 0; $count<count($_FILES['files']['name']); $count++)
				{
					$_FILES['file']['name'] = $_FILES['files']['name'][$count];
					$_FILES['file']['type'] = $_FILES['files']['type'][$count];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$count];
					$_FILES['file']['error'] = $_FILES['files']['error'][$count];
					$_FILES['file']['size'] = $_FILES['files']['size'][$count];

					if($this->upload->do_upload('file'))
					{
						$data = $this->upload->data();
						$output .= '
							<div class="col-md-3">
								<img src="'.base_url().'upload/multi/'.$data['file_name'].'" class="img-responsive img-thumbnail" />
							</div>
						';
					}
				}
				echo $output;
			}
		}
	}
?>