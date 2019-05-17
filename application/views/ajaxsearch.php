<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<h2 class="text-center"><?php echo $title; ?></h2>
		<div class="form-group">
	    	<div class="input-group">
		    	<span class="input-group-addon">Search</span>
		    	<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
	    	</div>
	   </div>
	   <br>
	   <div id="result"></div>
   </div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		load_data();

		function load_data(query)
		{
			$.ajax({
				url:'<?php echo base_url(); ?>ajaxsearch/fetch',
				method:'POST',
				data:{query,query},
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				load_data(search);
			}
			else
			{
				load_data();
			}
		});
	});
</script>