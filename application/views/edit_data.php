<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter Encryption and Decryption - Insert Data</title>
	    
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
	<div class="container">
		<br>
		<div class="box">
			<h3 align="center">Codeigniter3 Encryption and Decryption - Insert Data</h3>
			<br>
			<?php
				foreach($data->result() as $row)
				{
			?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#gender').val('<?php echo $this->encrypt->decode($row->gender); ?>');
					$('#country').val('<?php echo $row->country; ?>');
				});
			</script>
			<form method="POST" action="<?php echo base_url(); ?>encryptiondecryption/edit_validation">
				<input class="form-control" type="text" name="first_name" placeholder="Enter Your First Name" value="<?php echo $this->encrypt->decode($row->first_name); ?>" />
				<br>
				<input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name" value="<?php echo $this->encrypt->decode($row->last_name); ?>" />
				<br>
				<input type="text" name="age" class="form-control" placeholder="Enter Your Age" value="<?php echo $this->encrypt->decode($row->age); ?>" />
				<br>
				<select name="country" id="country" class="form-control">
					<?php
						foreach($country->result() as $data)
						{
							echo '<option value="'.$data->country_id.'">'.$data->country_name.'</option>';
						}
					?>
				</select>
				<br>
				<select name="gender" id="gender" class="form-control">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<br>
				<div align="center">
					<input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>">
					<input type="submit" name="insert" class="btn btn-success" value="Edit" />
				</div>
			</form>
			<?php		
				}
			?>



			<?php
				if(validation_errors() != '')
				{
					echo '
						<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>
					';
				}
			?>
			
		</div>
	</div>
</body>
</html>