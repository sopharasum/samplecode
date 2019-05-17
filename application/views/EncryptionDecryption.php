<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter3 Encryption and Decryption - Fetch Data</title>
    
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
	    body
	    {
	     background-color: #f1f1f1;
	    }
	    .box
	    {
	     width: 600px;
	     margin:0 auto;
	     background-color: #fff;
	     border:1px solid #ccc;
	     border-radius: 5px;
	     padding:16px;
    	}
 	</style>
</head>
<body>
	<br>
	<div class="container box">
		<h3 align="center">Codeigniter3 Encryption and Decryption - Fetch Data</h3>
		<br>
		<div class="table-responsive">
			<?php
				if($this->session->flashdata('action'))
				{
					echo '
						<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('action').'</div>
					';
				}
			?>
			<div align="right">
				<a href="<?php echo base_url(); ?>encryptiondecryption/insert" class="btn btn-primary btn-sm">Add</a>
			</div>
			<br>
			<table class="table table-striped table-bordered">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
					<th>Country</th>
					<th>Gender</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					foreach($data->result() as $row)
					{
						echo '
							<tr>
								<td>'.$this->encrypt->decode($row->first_name).'</td>
								<td>'.$this->encrypt->decode($row->last_name).'</td>
								<td>'.$this->encrypt->decode($row->age).'</td>
								<td>'.$row->country_name.'</td>
								<td>'.$this->encrypt->decode($row->gender).'</td>
								<td><a href="'.base_url().'encryptiondecryption/edit/'.$row->id.'">Edit</a></td>
								<td><a class="delete_data" id="'.$row->id.'">Delete</a></td>
							</tr>
						';
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_data').click(function(){
			var id = $(this).attr('id');
			if(confirm('Are you sure you want to delete?'))
			{
				window.location ='<?php echo base_url(); ?>encryptiondecryption/delete/'+id;
			}
			else
			{
				return false;
			}
		});
	});
</script>