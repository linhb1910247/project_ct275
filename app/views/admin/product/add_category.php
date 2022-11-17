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
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Add Category</h3>
<div class="container">
<div class="row-7 justify-content-md-center">
<div class="col col-lg-2"></div>
<div class="col-sm-7 ">
<form action="<?php echo BASE_URL ?>/product/insert_category" method="post">
  <div class="form-group">
    <h2 >Category name</h2>
    <input type="text" class="form-control" name="category_product_title"  placeholder="Category name">

  </div>
  <div class="form-group">
    <h2 >Category description</h2>
    <input type="text" class="form-control" name="category_product_desc" placeholder="Category description">
  </div>
  <div class="form-group">
    <h2  >category Image</h2>
    <input type="file" class="form-control" name="category_product_images"  placeholder="Product Image">

  </div>
  <div class="form-check">

  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<div class="col col-lg-2"></div>
</div>
</div>