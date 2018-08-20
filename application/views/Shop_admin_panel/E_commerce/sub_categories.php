<div class="row">
    <div class="form-group col-md-10">
        <h2>Sub Categories</h2>
        <p> Here are The Sub Categories That's Related to the Main Categories. 
    </div>
    <div class="form-group col-md-1">
        <p>&nbsp;</p>                
        <a href="<?=base_url('/index.php/shop_admin_panel_main/go_add_sub_categories')?>"><button class='btn btn-success'>Add Category</button></a>
    </div>
</div>    
<div class="row">
   <table class="table">
        <thead class="text-center">
            <tr>
                <th >#</th>
                <th>Category Name (EN)</th>
                <th>Category Name (AR)</th>
                <th>Sub Category Name (EN)</th>
                <th>Sub Category Name (AR)</th>
                <th>Alternative Sub Name (EN)</th>
                <th>Alternative Sub Name (AR)</th>                        
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $counter = 1 ;
            if(!empty($categories))
            foreach ($categories as $cat_id => $category){
				//Reset row values in every loob
				$category_id 			= null;				
				$cat_name_en 			= '';
            	$cat_name_ar 			= '';

            	$category_id = $category['category_id'];
            	$cat_name_en = $category['name_en'];
            	$cat_name_ar = $category['name_ar'];

            	if(!empty($sub_categories[$category['category_id']]))
            	foreach($sub_categories[$category['category_id']] as $sub_cat_id => $sub_cat_data){
            		//Reset row values in every loob
                    $sub_category_id        = null;
                    $sub_cat_name_en        = '';
                    $sub_cat_name_ar        = '';
                    $sub_cat_alt_name_en    = '';
                    $sub_cat_alt_name_ar    = '';

                    $sub_category_id 		= $sub_cat_id;
            		$sub_cat_name_en 		= $sub_cat_data['name_en'];
	            	$sub_cat_name_ar 		= $sub_cat_data['name_ar'];
	            	$sub_cat_alt_name_en 	= $sub_cat_data['mask_name_en'];
	            	$sub_cat_alt_name_ar 	= $sub_cat_data['mask_name_ar'];
            	?>
            <tr>
                <td class="text-center"><?=$counter++?></td>
                <td><?=$cat_name_en?></td>
                <td><?=$cat_name_ar?></td>
                <td><?=$sub_cat_name_en?></td>
                <td><?=$sub_cat_name_ar?></td>
                <td><?=$sub_cat_alt_name_en?></td>
                <td><?=$sub_cat_alt_name_ar?></td>

                <td class="td-actions text-right">
                    <div class='row'>
                        <div class='col-md-6'>
                             <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/go_update_sub_categories')?>">
                                <input type="hidden" name='cat_id' value ='<?=$category_id?>'>
                                <input type="hidden" name='sub_cat_id' value ='<?=$sub_category_id?>'>
                                <input type="hidden" name='mask_name_en' value ='<?=$sub_cat_alt_name_en?>'>                                
                                <input type="hidden" name='mask_name_ar' value ='<?=$sub_cat_alt_name_ar?>'>
                                <button type="submit" rel="tooltip" class="btn btn-info">
                                    <i class="material-icons">edit</i>    
                                </button>                            
                            </form>
                        </div>
                        <div class='col-md-6'>
                            <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/go_delete_sub_categories')?>">
                            	<input type="hidden" name='cat_id' value ='<?=$category_id?>'>
                                 <input type="hidden" name='sub_cat_id' value ='<?=$sub_category_id?>'>
                                <input type="hidden" name='mask_name_en' value ='<?=$sub_cat_alt_name_en?>'>                                
                                <input type="hidden" name='mask_name_ar' value ='<?=$sub_cat_alt_name_ar?>'>
                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">Delete</i>
                                </button>                          
                            </form>                                    
                        </div>
                    </div>                        
                </td>
            </tr>
           		<?php } 
        	}?>                    
        </tbody>
    </table>
</div>        
