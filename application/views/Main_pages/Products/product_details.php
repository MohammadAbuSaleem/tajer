<?php
if($product_details_data->in_stock == 1)
{
    $in_stock_html = '<strong><p class="text-success">In Stock</p></strong>';
}
else {
    $in_stock_html = '<strong><p class="text-danger">Out Of Stock</p></strong>';
}
if ($product_details_data->is_discount == 1)
{
    $saving_value =$product_details_data->price - $product_details_data->discount_price;
    $discount_html = "<span class='onsale'>Sale!</span>";
    $discount_price_discount_html ="<ins><span class='amount'>&#36;".$product_details_data->discount_price."</span></ins>";
    $discount_price_html = "<del><span class='amount'>&#36;".$product_details_data->price."</span></del>";
    $discount_saving_html=" <p>you saved &#36;".$saving_value."</p>";
}else
{
    $discount_html = "";
    $discount_price_discount_html ="";
    $discount_price_html = "<ins><span class='amount'>&#36;".$product_details_data->price."</span></ins>";
    $discount_saving_html ="";
}
?><div class="row product-summary">
    <div class="col-md-6">
        <div class="product-images"><?=$discount_html?>
            <div class="flexslider" data-flex-animation="slide" data-flex-controls="thumbnails" data-flex-controlsalign="left" data-flex-controlsposition="outside" data-flex-directions="hide" data-flex-directions-type="simple"
                data-flex-duration="600" data-flex-slideshow="true" data-flex-speed="7000" id="product-images">
                <ul class="slides product-gallery">
                    <?php
                    foreach ($product_images_data as $index => $product_image) {   ?>                  
                        <li data-thumb="<?=base_url()?>uploads/<?=$product_details_data->shop_code?>/<?=$product_image->file_name?>">
                            <figure> <img alt="Top Fancy" src="<?=base_url()?>uploads/<?=$product_details_data->shop_code?>/<?=$product_image->file_name?>">
                                <figcaption>
                                    <h4><a href="<?=base_url()?>uploads/<?=$product_details_data->shop_code?>/<?=$product_image->file_name?>">Zoom In</a></h4>
                                </figcaption>
                            </figure>
                        </li>
                    <?php }?>
                </ul>
            </div>
         </div>
    </div>
    <div class="col-md-6">
        <div class="summary entry-summary">
            <h1 class="product-title bordered"><?=$product_details_data->name_en?></h1>
            <div>
                <p class="price price-big">
                    <?=$discount_price_html?>
                    <?=$discount_price_discount_html?>
                </p>
                 <?=$discount_saving_html?>
                 <?=$in_stock_html?>
            </div>
            <div class="description">
                <p><?=$product_details_data->description_en?></p>
            </div>                
                <form action="<?=site_url('cart_controller/add_to_cart') ?>" method="post" id="add_to_cart_form">
                    <input type="hidden" name="product_id" value ='<?=$product_id?>'>
                    <div class="quantity"> 
                        <input type="button" value="-" class="minus"> 
                        <input class="input-text qty text" min="1" name="quantity" step="1" title="Qty" type="number" value="1"> <input type="button" value="+" class="plus"> 
                    </div>
                    <button class="single_add_to_cart_button button alt" type="submit">Add to cart</button> 
                </form>
                <div class="product_meta"> 
                     <span >Shop Name:
                        <a href="#" rel="tag"><?=$product_details_data->shop_code?></a>.
                    </span>                     
                    <span class="posted_in">Categories:
                        <a href="shop-mens-category.html" rel="tag">Jeans</a>,
                        <a href="shop-mens-category.html" rel="tag">Tops</a>,
                        <a href="shop-mens-category.html" rel="tag">Womens</a>.
                    </span> 
                    <span class="tagged_as">Tags:
                        <a href="shop-mens-category.html" rel="tag">new in</a>,
                        <a href="shop-mens-category.html" rel="tag">Recommended</a>,
                        <a href="shop-mens-category.html" rel="tag">Top</a>,
                        <a href="shop-mens-category.html" rel="tag">womens sale</a>.
                    </span> 
                    <span >Product Link:
                        <a href="<?=$product_details_data->product_link?>" rel="tag"><?=$product_details_data->product_link?></a>.
                    </span> 
                </div>
            <div>
                <ul class="social-icons social-sm social-background social-rect">
                    <li>
                        <a href="#"> <i class="fa fa-twitter"></i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-google-plus"></i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-facebook"></i> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="fa fa-pinterest"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>