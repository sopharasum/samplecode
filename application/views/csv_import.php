<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h3 class="text-center"><?php echo $title; ?></h3>
		<br>
		<form method="POST" id="import_csv" enctype="multipart/form-data">
			<div class="form-group">
				<label>Select CSV File</label>
				<input type="file" name="csv_file" id="csv_file" required accept=".csv" />
			</div>
			<br>
			<button type="submit" class="btn btn-success" name="import_csv" id="import_csv_btn">Import CSV</button>
		</form>
		<div id="imported_csv_data"></div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		load_data();

		function load_data()
		{
			$.ajax({
				url:'<?php echo base_url(); ?>csv_import/load_data',
				method:'POST',
				success:function(data)
				{
					$('#imported_csv_data').html(data);
				}
			});
		}

		$('#import_csv').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:'<?php echo base_url(); ?>csv_import/import',
				method:'POST',
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function()
				{
					$('#import_csv_btn').html('Importing...');
				},
				success:function(data)
				{
					$('#import_csv')[0].reset();
					$('#import_csv_btn').attr('disabled',false);
					$('#import_csv_btn').html('Import Done');
					load_data();
				}
			});
		});
	});
</script>