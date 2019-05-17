<?php
	class Zip_file extends CI_Controller
	{
		public function index()
		{
			$directory = 'upload';
			$data['images'] = glob($directory . '/*.png');
			$this->load->view('zip_file/view', $data);
		}

		public function download()
		{
			if($this->input->post('images'))
			{
				$this->load->library('zip');
				$images = $this->input->post('images');
				foreach($images as $image)
				{
					$this->zip->read_file($image);
				}
				$this->zip->download(time().'.zip');
			}
		}
	}
?>