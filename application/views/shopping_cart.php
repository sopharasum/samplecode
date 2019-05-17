<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-6">
			<div class="table-responsive">
				<h3 class="text-center">Codeigniter Shopping Cart with Ajax jQuery</h3>
				<br>
				<?php
					foreach($product as $row)
					{
				?>
				<div class="col-md-4" style="padding:16px;background-color: #f1f1f1; border: 1px solid #ccc; margin-bottom:16px; height:330px; align:center;">
					<img src="<?php echo base_url(); ?>upload/product/<?php echo $row->product_image; ?>" class="img-thumbnail" style="height: 120px; width: 150px;" /><br>
					<h4 align="center"><?php echo $row->product_name; ?></h4>
					<h4 class="text-danger text-center">$ <?php echo $row->product_price; ?></h4>
					<input type="text" name="quantity" class="quantity form-control" id="<?php echo $row->product_id; ?>"><br>
					<button class="btn btn-success btn-block add_cart" type="button" name="add_cart" data-productname="<?php echo $row->product_name; ?>" data-price="<?php echo $row->product_price; ?>" data-productid="<?php echo $row->product_id; ?>">Add to Cart</button>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md-6">
			<div id="cart_details">
				<h3 align="center">Cart is Empty</h3>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var product_id = $(this).data('productid');
			var product_name = $(this).data('productname');
			var product_price = $(this).data('price');
			var quantity = $('#' + product_id).val();

			if(quantity != '' && quantity > 0)
			{
				$.ajax({
					url:'<?php echo base_url(); ?>shopping_cart/add',
					method:'POST',
					data:{product_id:product_id,product_name:product_name,product_price:product_price,quantity:quantity},
					success:function(data)
					{
						alert('Product added to cart');
						$('#cart_details').html(data);
						$('#' + product_id).val('');
					}
				});
			}
			else
			{
				alert('Please Enter Quantity');	
			}

		});

		$('#cart_details').load('<?php echo base_url(); ?>shopping_cart/load');

		$(document).on('click','.remove_inventory', function(){
			var row_id = $(this).attr('id');
			if(confirm('Are you sure you want to remove this item?'))
			{
				$.ajax({
					url:'<?php echo base_url(); ?>shopping_cart/remove',
					method:'POST',
					data:{row_id:row_id},
					success:function(data)
					{
						alert('Product Removed from Cart Successfully');
						$('#cart_details').html(data);
					}
				});
			}
			else
			{
				return false;
			}
		});

		$(document).on('click','#clear_cart', function(){
			if(confirm('Are you sure you want to clear your cart?'))
			{
				$.ajax({
					url:'<?php echo base_url(); ?>shopping_cart/clear',
					success:function(data)
					{
						alert('Your cart has been clear...');
						$('#cart_details').html(data);
					}
					

				});
			}
			else
			{
				return false;
			}
		});
	});
</script>