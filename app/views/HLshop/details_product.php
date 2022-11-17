<?php
foreach ($detail_product as $key => $value){
    $product_name = $value['product_title'];
    $product_image = $value['product_image'];
    $product_price = $value['product_price'];
    $product_desc = $value['product_desc'];
    $product_quanlity = $value['product_quanlity'];
    $name_category_product = $value['category_product_title'];
}
?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/index/homepage">Home</a> <span class="mx-2 mb-0 ">/</span>
           <a href="<?php echo BASE_URL ?>/index/homepage">Shop</a> <span class="mx-2 mb-0">/</span> 
           <span class="text-secondary"><?php echo $name_category_product  ?>/</span>
           <span class="text-danger"><?php echo $product_name ?></span>

        </div>
        </div>
      </div>
    </div>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

                       <form action="<?php echo BASE_URL ?>/cart/addtocart" method="POST" >
                         <input type="hidden" name="id_product" value="<?php echo $value['product_id'] ?>" >
                        <input type="hidden" name="title_product" value="<?php echo $value['product_title'] ?>" >
                        <input type="hidden" name="image_product" value="<?php echo $value['product_image'] ?>">
                        <input type="hidden" name="price_product" value="<?php echo $value['product_price'] ?>">
                        <input type="hidden" name="quanliti" value="<?php echo $product['product_quanlity'] ?>">
                        <input type="hidden" name="quanlity_product" value="1">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $product_image ?>" alt="Image" class="img-fluid">
              </a>
              
            </div>

          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $product_name ?></h2>
            <h4><?php echo $product_desc ?></h4>
            <p><strong class="text-primary h4"><?php echo number_format($product_price,0,',','.').'VND'?></strong></p>
            <?php if ($product_quanlity!=0) {
                echo'<input type="submit" class=" btn-sm btn-primary"  class="bg-danger"  name="addcart" value="Addtocart">';
             }
              ?>
          
            </div>
           
          </div>
         

        </div>
      </div>
      </form>
