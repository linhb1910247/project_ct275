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
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Category</h3><table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Category description</th>
        <th class="text-center">Category image</th>
        <th class="text-center">Manage</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
        foreach ($category as $key => $cate){
            $i++;
    ?>
      <tr>
        <td class="text-center"><?php echo $i ?></td>
        <td class="text-center"><?php echo $cate['category_product_title'] ?></td>
        <td class="text-center"><?php echo $cate['category_product_desc'] ?></td>
        <td  class="text-center"><?php echo $cate['category_product_images'] ?></td>
        <td  class="text-center"><a href="<?php echo BASE_URL ?>/product/delete_category/<?php echo $cate['category_product_id']?>">Delete</a>||<a href="<?php echo BASE_URL ?>/product/edit_category/<?php echo $cate['category_product_id']?>">Update</a></td>
      </tr>
      <?php
        }
         ?>
    </tbody>
  </table>