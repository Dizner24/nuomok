<div class="container">
	<br /><br />
	
	<div class="col-lg-6 col-md-6">
		<div class="table-responsive">
			<h3 align="center"></h3><br />
			
			<?php
						foreach($product as $row)
			{
				
				echo '	
				<div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc;
				margin-bottom:16px; height:100%" align="center">
				<img src="'.base_url().'/myassets/images/'.$row->product_image.'" class="img-thumbnail" height="2000" width="2000" />
					<h4>'.$row->product_name.'</h4>
					<h3 class="text-danger">'.$row->product_price.' €(dienai)</h3>
					<input type="text" name="quantity" class="form-control quantity" placeholder="Dienų skaičius" id="'.$row->product_id.'" />
					<b>Patalpino: </b><i>'.$row->owner.'</i></b></br/>
					<button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->product_name.'"
					data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'" />Rezervuoti</button>
				</div>
				';
			}
			?>

					
			
		</div>
	</div>
	<div class="col-lg-6 col-md-6">
		<div id="cart_details">
			<h3 align="center">Neturite užrezervuotų prekių</h3>
		</div>
	</div>

	<script>
	$(document).ready(function(){
		
		$('.add_cart').click(function(){
			var product_id = $(this).data("productid");
			var product_name = $(this).data("productname");
			var product_price = $(this).data("price");
			var quantity = $('#' + product_id).val();
			if(quantity != '' && quantity > 0)
			{
				$.ajax({
					url:"<?php echo base_url(); ?>shopping_cart/add",
					method:"POST",
					data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
					success:function(data)
					{
						alert("Pridėta prie rezervacijų");
						$('#cart_details').html(data);
						$('#' + product_id).val('');
					}
				});
			}
			else
			{
				alert("Įveskite dienų skaičių (minimalus 1)");
			}
		});
		
		$('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");
		
		$(document).on('click', '.remove_inventory', function(){
				var row_id = $(this).attr("id");
				if(confirm("Ar tikrai norite tai išimti?"))
				{
					$.ajax({
						url:"<?php echo base_url(); ?>shopping_cart/remove",
						method:"POST",
						data:{row_id:row_id},
						success:function(data)
						{
							alert("Išimta");
							$('#cart_details').html(data);
						}
					})
				}
				else
				{
					return false;
				}
		});
		
		$(document).on('click', '#clear_cart', function(){
			if(confirm("Ar tikrai norite išvalyti rezervacijų sąrašą?"))
			{
				$.ajax({
					url:"<?php echo base_url(); ?>shopping_cart/clear",
					success:function(data)
					{
						alert("Išvalyta");
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
</div>