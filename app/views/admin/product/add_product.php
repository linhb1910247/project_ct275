
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
<h3 style="text-align: center; font-size: 38px;margin: 30px 0;">Add product</h3>
<div class="container">
<div class="row-7 justify-content-md-center">
<div class="col col-lg-2"></div>
<div class="col-sm-7 ">
<form action="<?php echo BASE_URL ?>/product/insert_product" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <h2 >Product Name</h2>
    <input type="text" class="form-control" name="product_title"  placeholder="Product Name">

  </div>
  <div class="form-group">
    <h2 class="heading" >Product Image</h2>
    <input type="file" class="form-control" name="product_image"  placeholder="Product Image">
  </div>
  <div class="form-group">
    <h2 >Price</h2>
    <input type="text" class="form-control" name="product_price"  placeholder="Price">

  </div>
  <div class="form-group">
    <h2 >Quantity</h2>
    <input type="text" class="form-control" name="product_quanlity"  placeholder="Quantity of product">
   

  </div>

  <div class="form-group">
    <h2 >Product description</h2>
    <textarea type="text" class="form-control" name="product_desc" placeholder="Product description"> </textarea>
  </div>
  <div class="form-group">
    <h2 >Category</h2>
    <select class="form-control" name="category_product_id">
          <?php
          foreach ($category as $key => $cate){
          ?>
          <option value="<?php echo $cate['category_product_id']?>"><?php echo $cate['category_product_title'] ?></option>
          <?php
            }
          ?>
    </select>
     

  </div>
  <div class="form-check">
    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <h2 class="form-check-h2" for="exampleCheck1">Check me out</h2> -->
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>
<div class="col col-lg-2"></div>
</div>
</div>




