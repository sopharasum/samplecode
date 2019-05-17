<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
 </head>
 <body>
 	<div class="container">
 		<h3 class="text-center"><?php echo $title; ?></h3>
 		<br/>
 		<label>Enter Email</label>
 		<input type="text" name="email" id="email" class="form-control" />
 		<span id="email_result"></span>
 		<br/>
 		<label>Enter Password</label>
 		<input type="password" name="password" id="password" class="form-control" />
 	</div>
</body>
</html>
<script>
	$(document).ready(function(){
		$('#email').change(function(){ //This is for change event function of input email into textfield
			var email = $('#email').val(); //create Email variable to store value from email textbox
			if(email != '') //check if email text box is not empty
			{
				$.ajax({
					url:"<?php echo base_url(); ?>index.php/first/check_email_avalibility",
					method:"POST",
					data:{email:email}, //which data we sent to server
					success:function(data)
					{
						$('#email_result').html(data); //display data result from server with HTML format
					}
				});
			}
		});
	});
</script>