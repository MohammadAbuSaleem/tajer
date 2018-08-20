 <div class="row">
	<div class="form-group col-md-10">
		<h2> Delete Category</h2>
		<p> Remove Categories from Your Market.
	</div>   
	<hr>    
</div>    
<div class ='col-md-12'>	
		<div class="row">
			<div class="form-group">
				<label for="mask_name_en">Are You Sure You Want To Remove This Category ?</label>
				
			</div>
		</div>
	 <div class='row'>
	 		<div class='col-md-5 text-center'>&nbsp;</div>
        	<div class='col-md-1 text-center'>        		
                <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/delete_category')?>">
                	<input type="hidden" name="category_id" value ='<?=$category_id?>' >  
                	<button type="submit" class="btn btn-danger">Delete</button>                	
                </form>                                        
        	</div>
        	<div class='col-md-1 text-center'>        		
                    <a href="<?=base_url('/index.php/shop_admin_panel_main/go_categories')?>">
                    	<button  class="btn btn-primary">Cancel</button>
                	</a>                                        
        	</div>
        	<div class='col-md-5 text-center'>&nbsp;</div>
        	
        </div>
</div>