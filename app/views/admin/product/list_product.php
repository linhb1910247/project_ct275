<?php
    if(!empty($_GET['msg'])){
        $msg= unserialize(urldecode($_GET['msg']));
       foreach( $msg as $key => $value ){
        echo '  <div class="container mt-4">
        <h2>Thông báo</h2>
        <div class="alert alert-success">
          <strong>'.$value.'</strong> 
        </div> ';
        }
    }
   
?>
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Category</h3><table class="table table-striped ">
  
<thead>
      <tr>
        <th>ID</th>
        <th  class="text-center">Name</th>
        <th  class="text-center">Image</th>
        <th  class="text-center">Category</th>
        <th  class="text-center">Price</th>
        <th  class="text-center">Quantity</th>
       
        <!-- <th>Mô tá</th> -->
        <th  class="text-center">Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
        foreach ($product as $key => $pro){
            $i++;
  ?>
      <tr>
        <td><?php echo $i ?></td>
        <td  class="text-center"><?php echo $pro['product_title'] ?></td>
        <td  class="text-center"><img   height="100" width="100" src="<?php echo BASE_URL ?>/public/upload/product/<?php  echo $pro['product_image'] ?>" ></td>
        <td  class="text-center"><?php echo $pro['category_product_title'] ?></td>
        <td  class="text-center"><?php echo number_format($pro['product_price'],0,',','.').'$' ?></td>
        <td  class="text-center"><?php echo $pro['product_quanlity'] ?></td>
        <!-- <td><?php echo $pro['product_desc'] ?></td> -->
        <td  class="text-center" ><a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['product_id']?>">Delete</a>||<a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['product_id']?>">Update</a></td>
      </tr>
      <?php
        }
         ?>
    </tbody>
  </table>