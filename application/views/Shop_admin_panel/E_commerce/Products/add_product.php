<div class="row">
	<div class="form-group col-md-10">
		<h2>Add  Product</h2>
		<p> Add a new Product with Information And Details.</p>
	</div>          
</div> 
<hr>

<div class ='col-md-12'>
	<form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/add_product')?>" name='updateProduct' onsubmit="return validateForm()">
		<div class="form-group"> 
			<label for="category_id">Category</label> 
			<select class="form-control" id='category_id'  name='category_id' onchange='change_category(this.value)'>
				<?php foreach ($shop_categories as $shop_category){
					if ($shop_category->mask_name_en!=null && $shop_category->mask_name_en!=''){  
				?>
				<option value = '<?=$shop_category->category_id?>'  > <?=$shop_category->mask_name_en?></option>
				<?php } else {?>
				<option value = '<?=$shop_category->category_id?>' > <?=$shop_category->name_en?></option>
				<?php  }
				}?>
			</select>               
		</div>

		<div class="form-group">
			<label for="sub_category_id">Sub Category</label>			
			<select class="form-control" id='sub_category_id'  name='sub_category_id'>				
			</select>               
		</div>

		<div class="form-group">
			<label for="name_en">Name (En)</label>
			<span style='color :red'> <?php echo form_error('name_en');?></span>
			<input type="text" class="form-control" id="name_en" placeholder="Name in English" name="name_en" value ='<?php echo set_value('name_en'); ?>'>                
		</div>

		<div class="form-group">
			<label for="name_ar">Name (Ar)</label>
			<span style='color :red'> <?php echo form_error('name_ar');?></span>
			<input type="text" class="form-control" placeholder="Name in Arabic" id="name_ar" name="name_ar" value ='<?php echo set_value('name_ar'); ?>' >                
		</div>

		<div class="form-group">
			<label for="description_en">Description (En)</label>                     
			<textarea class="form-control" placeholder="Write a Description" rows="5" id="description_en" name="description_en"></textarea>
		</div>
		<div class="form-group">
			<label for="description_ar">Description (Ar)</label>                    
			<textarea class="form-control" placeholder="Write a Description" rows="5" id="description_ar" name="description_ar"></textarea>
		</div>

		<div class="form-group">
			<label for="manufacturer">Manufacturer</label>
			<span style='color :red'> <?php echo form_error('manufacturer');?></span>
			<input type="text" class="form-control" id="manufacturer" placeholder="manufacturer" name="manufacturer" value ='<?php echo set_value('manufacturer'); ?>'>
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<span style='color :red'> <?php echo form_error('price');?></span>
			<input type="text" class="form-control" id="price" placeholder="Price" name="price"  value ='<?php echo set_value('Price'); ?>'>
		</div>
		<div class="form-group">
			<label for="product_link">Link</label>
			<input type="text" class="form-control" id="product_link" placeholder="product_link" name="product_link" value ='<?php echo set_value('product_link'); ?>' >
		</div>		
		<input type="hidden" name="after_load" id ='after_load' value ='0'> 
		<div class="form-group text-center">
			<button type="submit" class="btn btn-success" id ='submit'>Submit</button>
		</div>
	</form>
</div>

<script>     
     	function change_category(value){
     	var category_id  			= value
     	var options_html 			= '';
     	var sub_categories_count	= 0;

        $.ajax({
        url: '<?=base_url()?>index.php/shop_admin_panel_products/get_shop_sub_categories_ajax',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {'cat_id':category_id},
        beforeSend : function (){
        	$('#sub_category_id').attr('disabled','disabled');
        	$('#submit').attr('disabled','disabled');        	
        },
        success: function( data, textStatus, jQxhr ){      
        	$('#sub_category_id').removeAttr('disabled');
        	$('#submit').removeAttr('disabled');        	
        	data = jQuery.parseJSON(data);
        	sub_categories_count =Object.keys(data).length;

            $.each( data, function( key, sub_category ) {
            	if (sub_category.mask_name_en!=null && sub_category.mask_name_en!='')
            	options_html +="<option value ='"+sub_category.sub_category_id+"'>"+sub_category.mask_name_en+"</option>";
            	else
            	options_html +="<option value ='"+sub_category.sub_category_id+"'>"+sub_category.name_en+"</option>"   ;         				  	
			});
			$('#sub_category_id').html(options_html)			
			if (sub_categories_count == 0)
			{
				$('#sub_category_id').html('');
				$('#sub_category_id').attr('disabled','disabled');
			}
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
        });

     }

     function validateForm(){
     	if($('#sub_category_id option:selected').length <= 0  ){
     		 alert("Please Select a Sub Category.");
     		 return false;
     	}
     	else
     		return true;
     }     
 </script>