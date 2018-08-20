<?php extract((array) $product) ;
if ($discount_price ==null) $discount_price= 0;
if (!empty ($discount_start_date)) 
	$discount_start_date =date_format(date_create($discount_start_date),"m/d/Y");
if (!empty ($discount_end_date)) 
	$discount_end_date =date_format(date_create($discount_end_date),"m/d/Y")?>
<div class="row">
	<div class="form-group col-md-10">
		<h2>Edit Stocks</h2>
		<p> Manage Your Product Stock Availability And Number Of Stock In Your Shop.</p>
	</div>          
</div> 
<hr>

<div class ='col-md-12'>
	<form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/update_product_stock')?>">
 
		<br>
		<div class="form-group" >    
			<label for="stock_count">Number Of Stocks</label>            			
			<input type="text" class="form-control" id="stock_count" name="stock_count" value ='<?=$stock_count?>'>                
		</div>       
		<div class="form-group" >    
			<label for="stock_count">status</label>            
			<?php if ($stock_count == 0){ ?>
			<div id ='stock_text'>	
				<p style="color: red"> Out Of Stock </p>             
			</div>				
			<?php } elseif ($stock_count > 0){ ?>
			<div id ='stock_text'>
				<p style="color: green" > In Stock </p>             
			</div>
			<?php } ?>
		</div> 
		<input type="hidden" name="id" value ='<?=$id?>'>  
		<input type="hidden" name="in_stock" id="in_stock" value ='<?=$in_stock?>'>  
		<div class="form-group text-center">
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$('#stock_count').on('change',function(){
		var stock_count =$(this).val();		
		if(stock_count > 0 )
		{
			$('#stock_text').html( "<p style='color: green' > In Stock </p>");
			$('#in_stock').val(1)
		}
		else if (stock_count == 0 )
		{
			$('#stock_text').html( "<p style='color: red'> Out Of Stock </p>");
			$('#in_stock').val(0)
		}
		else if (!$.isNumeric(stock_count) || stock_count<0 )
		{
			$(this).val(0);
			$('#in_stock').val(0)
		}



	})
</script>