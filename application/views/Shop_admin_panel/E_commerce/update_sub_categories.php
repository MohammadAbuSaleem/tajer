        <div class="row">
            <div class="form-group col-md-10">
                <h2>Update Sub Category</h2>
                <p> Change How The Name of the Sub Category Should be shown in ur Website.
            </div>          
        </div> 
        <hr>

        <div class ='col-md-12'>
            <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/update_sub_category')?>">
                <div class="form-group">
                    <label for="mask_name_en">Alternarive Name - English</label>
                    <input type="text" class="form-control" id="mask_name_en" name="mask_name_en" placeholder="Enter Name in English" value ='<?=$mask_name_en?>'>                
                </div>
                <div class="form-group">
                    <label for="mask_name_ar">Alternarive Name - Arabic</label>
                    <input type="text" class="form-control" id="mask_name_ar" name ='mask_name_ar' placeholder="Enter Name in Arabic" value ='<?=$mask_name_ar?>'>                
                </div>
                <input type="hidden" name="category_id" value ='<?=$cat_id?>' >  
                <input type="hidden" name="sub_category_id" value ='<?=$sub_cat_id?>' > 
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>