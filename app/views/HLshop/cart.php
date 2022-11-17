
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>
<div>
  <?php
    if(!empty($_GET['msg'])){
        $msg= unserialize(urldecode($_GET['msg']));
       foreach($msg as $key => $value ){
        echo '  <div class="container mt-4">
        <h2>Thông báo</h2>
        <div class="alert alert-success">
          <strong>'.$value.'</strong> 
        </div> ';
      }
    }
    ?>
</div>
   
      <div class="container">
        <div class="row mb-5">
        <?php 
                if(isset($_SESSION['addtocart'])){
                  
                  ?>
          <form class="col-md-12" action="<?php echo BASE_URL ?>/cart/updatecart" method="post">
          
            <div class="site-blocks-table">
           
            <table class="table table-bordered">
                <thead>
              
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Update</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $total =0;
                    foreach($_SESSION['addtocart'] as $key =>$value){
                      $subtotal = $value['quanlity_product']*$value['price_product'];
                      //sau moi lan lap cong moi thu thanh tien lai
                      $total+=$subtotal;
                  ?>
                  <tr>
                 
                    <td class="product-thumbnail">
                      <img src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $value['image_product']?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $value['title_product']?></h2>
                    </td>
                    <td><?php echo number_format($value['price_product'],0,',','.').'VND'?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-info js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="number" value="<?php echo $value['quanlity_product'] ?>" name="qty[<?php echo $value['id_product'] ?>] " placeholder="" 
                        min="0" max="<?php echo $value['quanliti'] ?>" aria-label="Example text with button addon" aria-describedby="button-addon1" class="form-control text-center" >
                        <div class="input-group-append">
                          <button class="btn btn-outline-info js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td><?php echo number_format($subtotal,0,',','.').'VND'?></td>
                    <td>
                      <!-- <a href="#" class="btn btn-info height-auto btn-sm">X</a> -->
                      
                      <button type="submit"  name="delete_cart" value="<?php echo $value['id_product'] ?>"  class="btn btn-sm btn-danger">Xóa</button>
                      <button type="submit"  name="update_cart" value="<?php echo $value['id_product'] ?>"  class="btn btn-sm btn-info">Cập nhật</button>


                    </td>
                 
                  </tr>
                  <?php } ?> 
                </tbody>
              </table>
             
            </div>
           
           
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <a  href="<?php echo BASE_URL ?>/sanpham/tatca" class="btn btn-info btn-sm btn-block">Update Cart</a>
              </div>
              
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-info btn-sm px-4">Apply Coupon</button>
              </div>
            </div> -->
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div> -->
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo number_format($total,0,',','.').'VND'?></strong>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-md-12">
                    <a class="btn btn-info btn-lg btn-block" href='<?php echo BASE_URL ?>/cart/dathang'>Proceed To Checkout</a>
                    
                  </div>
                </div>
                <?php } ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    
