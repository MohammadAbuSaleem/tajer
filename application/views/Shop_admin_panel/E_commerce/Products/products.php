<style type="text/css">
            /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
        <div class="row">
            <div class="form-group col-md-10">
                <h2>Products</h2>
                <p> Manage Your Products.
            </div>
            <div class="form-group col-md-1">
                <p>&nbsp;</p>                
                <a href="<?=base_url('/index.php/shop_admin_panel_products/go_add_product')?>"><button class='btn btn-success'>Add Product</button></a>
            </div>
        </div>    
        <div class="row">
           <table class="table">
                <thead class="text-center">
                    <tr>
                        <th >#</th>
                        <th>Name (EN)</th>
                        <th>Description (EN)</th>                        
                        <th>Discounts</th>
                        <th>Stock</th>
                        <th>Active</th>
                        <th>Photos</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $counter = 1 ;
                    foreach ($products as $product){
                        $active = '';
                        if ($product->is_active == 1)             
                            $active = ' checked';
                        ?>
                    <tr>
                        <td class="text-center"><?=$counter++?></td>
                        <td><?=$product->name_en?></td>
                        <td><?=$product->description_en?></td>                        
                        <td class="td-actions">
                            <div class='row'>
                                <div class='col-md-6'>
                                     <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/go_update_product_discount')?>">
                                        <input type="hidden" name='product_id' value ='<?=$product->id?>'>                                        
                                        <button type="submit" rel="tooltip" class="btn btn-default">
                                            <i class="fa fa-align-justify"></i>
                                        </button>                            
                                    </form>
                                </div>                                
                            </div>                        
                        </td>
                        <td class="td-actions">
                            <div class='row'>
                                <div class='col-md-6'>
                                     <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/go_update_product_stock')?>">
                                        <input type="hidden" name='product_id' value ='<?=$product->id?>'>                                        
                                        <button type="submit" rel="tooltip" class="btn btn-default">
                                            <i class="fa fa-align-justify"></i>
                                        </button>                            
                                    </form>
                                </div>                                
                            </div>                        
                        </td>
                        <td class="td-actions">
                            <div class='row'>
                                <div class='col-md-6'>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                      <input type="checkbox" id ='active_inactive' <?=$active?>>
                                      <span class="slider round"></span>
                                    </label>
                                </div>                                
                            </div>                        
                        </td>
                        <td class="td-actions">
                            <div class='row'>
                                <div class='col-md-6'>
                                     <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/go_manage_product_images')?>">
                                        <input type="hidden" name='product_id' value ='<?=$product->id?>'>
                                        <button type="submit" rel="tooltip" class="btn btn-default">
                                            <i class="fa fa-image"></i>
                                        </button>                            
                                    </form>
                                </div>                                
                            </div>                        
                        </td>
                        <td class="td-actions text-right">
                            <div class='row'>
                                <div class='col-md-6'>
                                     <form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_products/go_update_product')?>">
                                        <input type="hidden" name='product_id' value ='<?=$product->id?>'>                                        
                                        <button type="submit" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">Edit</i>    
                                        </button>                            
                                    </form>
                                </div>                                
                            </div>
                             <input type="hidden" id = 'product_id' value ='<?=$product->id?>'>                        
                        </td>
                    </tr>
                    <?php }?>                    
                </tbody>
            </table>
        </div>        
 <script>
     $('#active_inactive').on('change',function(){
        var checked     = $('#active_inactive').is(':checked');
        var product_id  = $('#product_id').val();


        $.ajax({
        url: '<?=base_url()?>index.php/shop_admin_panel_products/toggle_product_active',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {'id':product_id,'is_active':(+ checked)},
        success: function( data, textStatus, jQxhr ){             
            console.log( data)      
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
        });

     })
 </script>