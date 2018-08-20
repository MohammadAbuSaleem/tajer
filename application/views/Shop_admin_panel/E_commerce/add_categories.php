 <div class="row">
	<div class="form-group col-md-10">
		<h2> Add Category</h2>
		<p> Select Categories That Your Shop have Products to.
	</div>   
	<hr>    
</div>    
<div class ='col-md-12'>
	<form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/add_categories')?>">
		<div class="row">
           <table class="table">
                <thead class="text-center">
                    <tr>
                        <th >&nbsp;</th>
                        <th>Name (EN)</th>
                        <th>Name (AR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($website_categories as $index => $web_category){?>
                    <tr>
                    	<?php 
                    	$checked = '';
                    	foreach ($shop_categories as $index => $shop_category){
                    		if( $shop_category->category_id ==$web_category->id )
                    			$checked = 'checked disabled';
                    	}?>

                        <td class="text-center">
                        	<div class="form-check">							    
							        <input class="form-check-input" type="checkbox" value="<?= $web_category->id?>" name ='new_categories[]' <?=$checked?>>
							        <span class="form-check-sign">
							            <span class="check"></span>
							        </span>
							</div>
                        </td>
                        <td class="text-center"><?=$web_category->name_en?></td>
                        <td class="text-center"><?=$web_category->name_ar?></td>                        
                    </tr>
                    <?php }?>                    
                </tbody>
            </table>
        </div>
        <div class='row'>
        	<div class='col-md-12 text-center'>        		
                    <button type="submit" class="btn btn-success">Add Selected Categories</button>
        	</div>
        </div>
    </form>
</div>