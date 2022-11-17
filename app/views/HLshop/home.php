 
      <div class="container">
        <div class="title-section mb-5">
          <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
        </div>
        <div class="row align-items-stretch">
        <?php 
                    foreach ($category as $key => $cate){      
                    ?>    
          <div class="col-lg-2">
            
            <a class="product_category" href="<?php echo BASE_URL ?>/sanpham/danhmuc/<?php echo $cate['category_product_id'] ?> "><?php echo $cate['category_product_title'] ?></a>
            <img     class="mb-1 mx-3" width="180" height="200" src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $cate['category_product_images'] ?>" alt="Product" class="img-fluid">
         
          </div>
         
          <?php
                    }
                    ?>
        </div>
      </div>
      <div class="container">
     
      <div class="row">
         
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Popular Products</h2>
          </div>
        </div>
        <div class="row clearfix">
        <?php 
                     foreach ($list_product as $key =>$product){
     
               ?>
            <div class="col-lg-3 col-md-4 col-sm-12">
            <form action="<?php echo BASE_URL ?>/cart/addtocart" method="POST">
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
   


     

    <!-- <div class="site-blocks-cover inner-page py-5" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto order-md-2 align-self-start">
            <div class="site-block-cover-content">
            <h2 class="sub-title">#New Summer Collection 2022</h2>
            <h1>New Shoes</h1>
            <p><a href="#" class="btn btn-black rounded-0">Buy Now</a></p>
            </div>
          </div>
          <div class="col-md-6 order-1 align-self-end">
            <img src="images/model_6.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div> -->

