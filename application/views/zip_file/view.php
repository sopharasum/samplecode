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
		<h3 align="center">How to Export Mysql Data to CSV File in Codeigniter</h3>
		<br>
		<form method="POST" action="<?php echo base_url(); ?>zip_file/zip_file/download">
			<?php
				foreach($images as $image)
				{
					echo '
						<div class="col-md-2" align="center" style="margin-bottom: 24px;">

							<img src="'.base_url().''.$image.'" class="img-thumbnail img-responsive" />
							<br>
							<input type="checkbox" name="images[]" class="select" value="'.$image.'" /> 
						</div>
					';
				}
			?>
			<br>
			<input type="submit" name="download" class="btn btn-primary" value="Download" />
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('.select').click(function(){
			if(this.checked)
			{
				$(this).parent().css('border', '5px solid #ff0000');
			}
			else
			{
				$(this).parent().css('border', 'none');
			}
		})
	});
</script>