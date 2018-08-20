        <div class="row">
            <div class="form-group col-md-10">
                <h2>Categories</h2>
                <p> Here are The Categories That Your Products Belongs to. 
            </div>
            <div class="form-group col-md-1">
                <p>&nbsp;</p>                
                <a href="<?=base_url('/index.php/shop_admin_panel_main/go_add_categories')?>"><button class='btn btn-success'>Add Category</button></a>
            </div>
        </div>    
        <div class="row">
           <table class="table">
                <thead class="text-center">
                    <tr>
                        <th >#</th>
                        <th>Name (EN)</th>
                        <th>Name (AR)</th>
                        <th>Alternative Name (EN)</th>
                        <th>Alternative Name (AR)</th>                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $counter = 1 ;
                    foreach ($categories as $category){?>
                    <tr>
                        <td class="text-center"><?=$counter++?></td>
                        <td><?=$category['name_en']?></td>
                        <td><?=$category['name_ar']?></td>
                        <td><?=$category['mask_name_en']?></td>
                        <td><?=$category['mask_name_ar']?></td>                        
                        <td class="td-actions text-right">
                            <div class='row'>
                                <div class='col-md-6'>
                                     <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/go_update_categories')?>">
                                        <input type="hidden" name='cat_id' value ='<?=$category['category_id']?>'>
                                        <input type="hidden" name='mask_name_en' value ='<?=$category['mask_name_en']?>'>                                
                                        <input type="hidden" name='mask_name_ar' value ='<?=$category['mask_name_ar']?>'>
                                        <button type="submit" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">edit</i>    
                                        </button>                            
                                    </form>
                                </div>
                                <div class='col-md-6'>
                                    <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/go_delete_categories')?>">
                                        <input type="hidden" name='cat_id' value ='<?=$category['category_id']?>' class="btn btn-info">                                
                                        <input type="hidden" name='mask_name_en' value ='<?=$category['mask_name_en']?>'>                                
                                        <input type="hidden" name='mask_name_ar' value ='<?=$category['mask_name_ar']?>'>
                                        <button type="submit" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">Delete</i>
                                        </button>                          
                                    </form>                                    
                                </div>
                            </div>                        
                        </td>
                    </tr>
                    <?php }?>                    
                </tbody>
            </table>
        </div>        
 