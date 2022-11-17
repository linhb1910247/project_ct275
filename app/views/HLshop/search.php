<div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
        
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0">/</span> 

          <strong class="text-black">Search / 
            <?php     if(isset($_POST['tukhoa'])){
                $tukhoa=$_POST["tukhoa"];
                
            }else{
                $tukhoa='';
            } 
            echo $tukhoa;
            ?>
            </strong>
         </div>
        </div>
      </div>
    </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

        <div class="container">

    <div class="row clearfix">
    <?php 
                     foreach ($search_list as $key =>$result){
     
               ?>   
        <div class="col-lg-3 col-md-4 col-sm-12">
        <form action="<?php echo BASE_URL ?>/cart/addtocart" method="POST" >
        <input type="hidden" name="id_product" value="<?php echo $result['product_id'] ?>" >
                    <input type="hidden" name="title_product" value="<?php echo $result['product_title'] ?>" >
                    <input type="hidden" name="image_product" value="<?php echo $result['product_image'] ?>">
                    <input type="hidden" name="price_product" value="<?php echo $result['product_price'] ?>">
                    <input type="hidden" name="quanlity_product" value="1">
            <div class="card product_item">
           
                <div class="body">
                    <div class="cp_img">
                        <img  class="mb-1 mx-3" width="180" height="200"  src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $result['product_image'] ?>" alt="Product" class="img-fluid">
                        <div class="hover">
                        <a href="javascript:void(0);" class=" btn-primary btn-sm waves-effect"><i class="zmdi zmdi-plus"></i>
                        <input type="submit" class=" btn-primary"  class="bg-danger"  name="addcart" value="Đặt hàng">
                        </a>
                        <a href="javascript:void(0);" class=" btn-primary btn-sm waves-effect"><i class="zmdi zmdi-shopping-cart"></i></a>
                    </div>
                        
                    </div>
                    
                    <div class="product_details">
                        <h5><a href="ec-product-detail.html"><?php echo $result['product_title']?></a></h5>
                        <ul class="product_price list-unstyled">
                            <!-- <li class="old_price">$16.00</li> -->
                            <li class="new_price"><?php echo number_format($result['product_price'],0,',','.'). 'VND' ?></li>
                        </ul>
                        <div>
                            <a href="<?php echo BASE_URL ?>/sanpham/chitietsanpham/<?php echo $result['product_id'] ?>" >xem chi tiết</a>
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