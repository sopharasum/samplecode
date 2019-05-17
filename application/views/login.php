<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<br/><br/><br/>
		<form method="POST" action="<?php echo base_url(); ?>index.php/first/login_validation">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" />
				<span class="text-danger"><?php echo form_error('username'); ?></span>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>
			<div class="form-group">
				<input type="submit" name="insert" value="Login" class="btn btn-info" />
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		</form>
	</div>
</body>
</html>