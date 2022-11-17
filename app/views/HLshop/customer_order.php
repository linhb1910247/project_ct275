
<div class="site-blocks-cover inner-page" style="background-image: url('<?php echo BASE_URL ?>/public/images/about_1.png'); background-repeat: no-repeat; background-size: cover; background-position: center" data-aos="fade">
      <div class="container">
        <div class="row">
        
        </div>
      </div>
    </div>

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a  href="<?php echo BASE_URL ?>/index/homepage/<?php echo BASE_URL ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Order</strong></div>
        </div>
      </div>
    </div>
<div class="container col-11">
<h1 class="m-2" style="text-align: center;"> Orders Your</h1>

<table class="table table-striped">
  <thead >
      <tr>
        <th class="text-center"><Span>ID</Span></th>
        <th class="text-center"><Span>Order code</Span></th>
        <th class="text-center"><Span>order date</Span></th>
        <th class="text-center"><Span>Mangger</Span></th>
        <th class="text-center"><Span>Status</Span></th>
        <th class="text-center"><Span>Resquest </Span></th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    $total=0;
        foreach ($order_details as $key => $ord){
          
            $i++;
    ?>

      <tr class="col 6">
        <td class="text-center"><?php echo $i ?></td>
        <td class="text-center"><?php echo $ord['order_code'] ?></td>
        <td class="text-center"><?php echo $ord['order_date'] ?></td>
        <td class="text-center"><a href="<?php echo BASE_URL ?>/order/customer_orderdetails/<?php echo $ord['order_code'] ?>">Details</a></td>
        <td style="text-align: center;"><?php if($ord['order_status']== 0){echo 'New order';} 
        else if($ord['order_status']==1) {echo 'Processed';}else {echo 'Cancelled';} ?></td>
        
       
       
        <td class="text-center">
            <?php if($ord['cancel']==0){?>
              <form method="post" action="<?php echo BASE_URL?>/order/canncel_order">
              <input type="hidden" name="code" value="<?php echo $ord['order_code']?>">
              <input type="hidden" name="customers_id" value="<?php echo $ord['customers_id']?>">
              <input type="hidden" value="1" name="cancel" >
              <button type="submit" class="btn btn-info" >cancel</button>
            </form>
            <?php }else{ ?>
                <p>Wait process...</p>
              <?php } ?>      
           
        </td>
      </tr>
      <?php
        }
         ?>
         
       
         </form>
    </tbody>
</table>
</div>