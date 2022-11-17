
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;"> Orders detail</h3>

<table class="table table-striped">
  <thead >
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Poduct name</th>
        <th class="text-center">Images</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
        <th class="text-center">Total product</th>
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
         <form method="post" action="<?php echo BASE_URL?>/order/order_confirm/<?php echo $ord['order_code'] ?>">
         <tr colspan="6">
            <td> <input type="submit" name="update_order" value="Process" class="btn btn-primary"></td>
            <td colspan="6"  align="right"> Total:  <?php echo number_format($total,0,',','.').'$' ?></td>
         </tr>
         </form>
    </tbody>
</table>