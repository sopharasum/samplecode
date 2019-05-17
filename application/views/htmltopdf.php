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
		<h3 align="center"><?php echo $title; ?></h3>
		<?php
			if(isset($customer_data))
			{
		?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>View</th>
					<th>View in PDF</th>
				</tr>
			<?php
				foreach ($customer_data->result() as $row) {
					echo '
				<tr>
					<td>'.$row->CustomerID.'</td>
					<td>'.$row->CustomerName.'</td>
					<td><a href="'.base_url().'htmltopdf/details/'.$row->CustomerID.'">View</a></td>
					<td><a href="'.base_url().'htmltopdf/pdfdetails/'.$row->CustomerID.'">View in PDF</a></td>
				</tr>	
					';
				}
			?>
			</table>
		</div>
		<?php		
			}
			elseif(isset($customer_details))
			{
				echo $customer_details;
			}
		?>
	</div>
</body>
</html>