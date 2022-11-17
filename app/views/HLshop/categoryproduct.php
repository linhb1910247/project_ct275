
         
    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
        <?php 
                     foreach ($category_by_id as $key =>$cate){
                     }
               ?>
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0">/</span> 
          <strong class="text-black">Shop/ <?php echo $cate['category_product_title']?></strong>
         </div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <div class="container">
    
        <div class="row clearfix">
            <?php 
                     foreach ($category_by_id as $key =>$product){
     
               ?>
      

            <div class="col-lg-3 col-md-4 col-sm-12">
            <form action="<?php echo BASE_URL ?>/cart/addtocart" method="POST" >
            <input type="hidden" name="id_product" value="<?php echo $product['product_id'] ?>" >
                        <input type="hidden" name="title_product" value="<?php echo $product['product_title'] ?>" >
                        <input type="hidden" name="image_product" value="<?php echo $product['product_image'] ?>">
                        <input type="hidden" name="price_product" value="<?php echo $product['product_price'] ?>">
                        <input type="hidden" name="quanliti" value="<?php echo $product['product_quanlity'] ?>">
                        <input type="hidden" name="quanlity_product" value="1">
                <div class="card product_item">
               
                    <div class="body">
                        
                        <div class="cp_img">
                        <?php if($product['product_quanlity']==0){
                              echo '<span class="btn-info  btn-sm">Out of order</span>';
                            ?>
                            <img  class="mb-1 mx-3" width="180" height="200"  src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product['product_image'] ?>" alt="Product" class="img-fluid">
                        <?php 
                               }else { ?>
                            <img  class="mb-1 mx-3" width="180" height="200"  src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product['product_image'] ?>" alt="Product" class="img-fluid">
                            <div class="hover">
                            <a href="javascript:void(0);" class=" btn-primary btn-sm waves-effect">
                            <input type="submit" class=" btn-primary"  class="bg-danger"  name="addcart" value="Đặt hàng">
                            </a>
                             </div>
                           
                           <?php } ?> 
                        </div>
                        
                        <div class="product_details">
                            <h5><a href="ec-product-detail.html"><?php echo $product ['product_title']?></a></h5>
                            <ul class="product_price list-unstyled">
                                <!-- <li class="old_price">$16.00</li> -->
                                <li class="new_price"><?php echo number_format($product ['product_price'],0,',','.'). '$' ?></li>
                            </ul>
                            <div>
                                <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $product['product_id'] ?>" >xem chi tiết</a>
                            </div>
                        </div>
                      
                    </div>
                </div>
                </form>
            </div>

                    <?php
                     }
                     ?>
        </div>
       
    </div>