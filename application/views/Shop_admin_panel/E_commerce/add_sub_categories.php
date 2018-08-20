 <div class="row">
	<div class="form-group col-md-10">
		<h2> Add Sub Category</h2>
		<p> Select Sub Categories That Your Shop have Categories to.
	</div>   
	<hr>    
</div>    
<div class ='col-md-12'>
	<form method ='post' action = "<?=base_url('/index.php/shop_admin_panel_main/add_sub_categories')?>">
		<div class="row">
		   <table class="table">
				<thead class="text-center">
					<tr>
						<th >&nbsp;</th>
						<th>Category Name (EN)</th>
						<th>Category Name (AR)</th>
						<th>Category Sub Name (EN)</th>
						<th>Category Sub Name (AR)</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(!empty($website_categories))
					foreach ($website_categories as $index => $web_category)
					{
						foreach ($shop_categories as $index => $shop_category)
						{
							if($shop_category->category_id == $web_category->id )
							{
								//Reset row values in every loob
								$category_id 			= null;				
								$cat_name_en 			= '';
								$cat_name_ar 			= '';

								$category_id = $web_category->id;
								$cat_name_en = $web_category->name_en;
								$cat_name_ar = $web_category->name_ar;
														
								foreach ($website_sub_categories as $sub_index => $web_sub_category)
								{
									if( $web_sub_category->category_id == $web_category->id)
									{
										//Reset row values in every loob
										$sub_id 				= null;
										$sub_cat_name_en        = '';
										$sub_cat_name_ar        = '';	

										$sub_id 				= $sub_id;
										$sub_cat_name_en 		= $web_sub_category->name_en;
										$sub_cat_name_ar 		= $web_sub_category->name_ar;
										?>
							<tr>
										<?php 
										$checked = '';        			
										foreach ($shop_sub_categories as $index => $shop_sub_category)
										{
											if( $shop_sub_category->category_id ==$web_category->id &&  $shop_sub_category->sub_category_id == $web_sub_category->id )
												{
													$checked = 'checked disabled';
												}
										}								
										?>

								<td class="text-center">
									<div class="form-check">							    
											<input class="form-check-input" type="checkbox" value="<?= $web_sub_category->id?>" name ='new_sub_categories[]' <?=$checked?>>
											<span class="form-check-sign">
												<span class="check"></span>
											</span>
									</div>
								</td>
								<td class="text-center"><?=$cat_name_en?></td>
								<td class="text-center"><?=$cat_name_ar?></td>
								<td class="text-center"><?=$sub_cat_name_en?></td>
								<td class="text-center"><?=$sub_cat_name_ar?></td>                        
							</tr>
									<?php
									} 
								}
							}
						}
					}?>                    
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