
<div class="site-blocks-cover inner-page" style="background-image: url('<?php echo BASE_URL ?>/public/images/about_1.png'); background-repeat: no-repeat; background-size: cover; background-position: center" data-aos="fade">
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
      <?php 
    
        foreach ($order_details as $key => $ord){  
          $id_customer=$ord['customers_id'];
        } 
    ?>
          <div class="col-md-12 mb-0"><a href="<?php echo BASE_URL ?>/order/customer_order/<?php echo  $id_customer ?>">Order</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Order Details</strong></div>
          
        </div>
       
      </div>
    </div>
<div class="container col-11">
<h1 class="m-2" style="text-align: center;"> Orders Your</h1>

<table class="table table-striped">
  <thead >
      <tr>
        <th class="text-center"><Span>ID</Span></th>
        <th class="text-center"><Span>Poduct name</Span></th>
        <th class="text-center"><Span>Images</Span></th>
        <th class="text-center"><Span>Quantity</Span></th>
        <th class="text-center"><Span>Price</Span></th>
        <th class="text-center"><Span>Total product </Span></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    $total=0;
        foreach ($order_details as $key => $ord){
            $total +=$ord['order_product_quanlity']*$ord['product_price'];
            $i++;
    ?>

      <tr class="col 6">
        <td class="text-center"><?php echo $i ?></td>
        <td class="text-center"><?php echo $ord['product_title'] ?></td>
        <td class="text-center"><img width='100px'height='100px' src="<?php echo BASE_URL ?>/public/upload/product/<?php echo $ord['product_image'] ?>"></td>
        <td class="text-center"><?php echo $ord['order_product_quanlity'] ?></td>
        <td class="text-center"><?php echo number_format($ord['product_price'],0,',','.').'$' ?></td>
        <td class="text-center"><?php echo number_format(($ord['order_product_quanlity']*$ord['product_price']),0,',','.').'$' ?></td>
        
      
      </tr>
      <?php
        }
         ?>
         
         <tr >
            
            <td colspan="10"  align="right"><span class="text-danger"> Total:  </span> <?php echo number_format($total,0,',','.').'$' ?></td>
         </tr>
         </form>
    </tbody>
</table>
</div>