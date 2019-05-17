<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h3 class="text-center"><?php echo $title; ?></h3>
		<br>
		<div align="center">
			<form method="POST" action="<?php echo base_url(); ?>excel_export/action">
				<input type="submit" name="export" class="btn btn-success btn-lg btn-block" value="Export to Excel" />
			</form>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td>Country Code</td>
					<td>Country Name</td>
					<td>Code</td>
				</tr>
					<?php
						foreach($country_data as $row)
						{
					?>
				<tr>
					<td><?php echo $row->countrycode; ?></td>
					<td><?php echo $row->countryname; ?></td>
					<td><?php echo $row->code; ?></td>
				</tr>
					<?php		
						}
					?>
			</table>
		</div>
	</div>
</body>
</html>