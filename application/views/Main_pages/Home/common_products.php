<style type="text/css">
    .product-image{
        height: 200px;
    }
</style>
<section class="section">
    <div class="container container-vertical-middle">
        <div class="row vertical-middle">
            <div class="col-md-3">
                <h2 class="text-left element-top-20 element-bottom-20 os-animation normal" data-os-animation="fadeIn" data-os-animation-delay="0s">Common Products</h2>
            </div>
            <div class="col-md-9">
                <hr class="element-top-0 element-bottom-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0s"> </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="divider-wrapper">
                    <div class="visible-xs element-height-30"></div>
                    <div class="visible-sm element-height-30"></div>
                    <div class="visible-md element-height-30"></div>
                    <div class="visible-lg element-height-30"></div>
                </div>
                <div class="woocommerce columns-6">
                    <div class="row">
                        <ul class="products">
                            <?php foreach ($common_products_data as $index => $product){
                                
                                $discount_html = $discount_price_html_before=$discount_price_html_after='';
                                if ($product->is_discount == 1)
                                {
                                    $discount_html = "<span class='onsale'>Sale!</span>";
                                    $discount_price_discount_html ="<inx><span class='amount'>&#36;".$product->discount_price."</span></ins>";
                                    $discount_price_html = "<del><span class='amount'>&#36;".$product->price."</span></del>";
                                }else
                                {
                                    $discount_price_discount_html ="";
                                    $discount_price_html = "<span class='amount'>&#36;".$product->price."</span>";
                                }
                            ?>
                            <li class="product col-md-2"> 
                                <a href="<?=base_url();?>index.php/products_controller/go_product/<?=$product->product_id?>">
                                    <?=$discount_html?>
                                    <div class="product-image ">
                                        <div class="product-image-front">
                                            <img alt="jacket2-1" height="893" src="<?=base_url()?>uploads/<?=$product->shop_code?>/<?=$product->file_name?>" width="700">
                                        </div>

                                        <div class="product-image-back"><img alt="jacket2-2" src="<?=base_url()?>uploads/<?=$product->shop_code?>/<?=$product->file_name_2?>"></div>

                                        <div class="product-image-overlay">
                                            <h4>View Details</h4>
                                        </div>
                                    </div>
                                </a>
                                <div class="product-info">
                                    <h3 class="product-title"> 
                                        <a href="shop-simple-product.html"><?=$product->name_en?></a> 
                                    </h3> 
                                    <span class="product-categories">
                                        <a href="shop-mens-category.html" rel="tag">Hoodies</a>,
                                        <a href="shop-mens-category.html" rel="tag">Jackets</a>,
                                        <a href="shop-mens-category.html" rel="tag">Mens</a>
                                    </span>
                                    <h3 class="price"> 
                                        <?=$discount_price_html?>
                                        <?=$discount_price_discount_html?>
                                    </h3>
                                    <a class="add-to-cart-button" href="#" rel="nofollow"> 
                                        <i class="icon-bag"></i> 
                                    </a>
                                </div>
                            </li>
                            <?php } ?>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>