<?php
    class product extends Dcontroller{
        public function __construct(){
           parent::__construct();
        }
        public function index(){
           $this->add_category();
            
        }
        
        public function add_category(){
          Session::chesksession_customer();
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
           $this->load->view("admin/product/add_category");
           $this->load->view("admin/footer");
       
        }
        public function add_product(){
          Session::chesksession_customer();
         $this->load->view("admin/header");
         $this->load->view("admin/menu");

         $table = "tb_category_product";
         $categorymodel =$this->load->model('categorymodel');
         $data['category'] = $categorymodel->category($table);
         $this->load->view("admin/product/add_product",$data);
         $this->load->view("admin/footer");
     
      }
      public function insert_product(){
        $title=$_POST['product_title'];
        $price=$_POST['product_price'];
        $quanlity=$_POST['product_quanlity'];
        $desc=$_POST['product_desc'];
        $category=$_POST['category_product_id'];

        $image=$_FILES['product_image']['name'];
        $tmp_image=$_FILES['product_image']['tmp_name'];

        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;

        $path_upload = "public/upload/product/".$unique_image;

        
       $table = "tbl_product";
       $data =array(
         'product_title' =>$title,
         'product_image' =>$unique_image,
         'product_price' =>$price,
         'product_quanlity' =>$quanlity,
         'product_desc' =>$desc,
         'category_product_id' =>$category
       );
       $categorymodel =$this->load->model('categorymodel');
       $result = $categorymodel->insertproduct($table,$data);
       if($result==1){
        move_uploaded_file($tmp_image,$path_upload);
         $message['msg']="Thêm sản phẩm thành công!!";
         header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message)));
       }else{
         $message['msg']="Thêm sản phẩm thất bại!!";
         header('Location:'.BASE_URL."/product/add_product?msg=".urlencode(serialize($message)));          }
     }
     public function list_product(){
      Session::chesksession_customer();
      $this->load->view("admin/header");
      $this->load->view("admin/menu");
      $table_product = "tbl_product";
      $table_category = "tb_category_product";
      $categorymodel =$this->load->model('categorymodel');
      $data['product'] = $categorymodel->product($table_product, $table_category);
      $this->load->view("admin/product/list_product",$data);
      $this->load->view("admin/footer");
  }

  public function delete_product($id){
    $table = "tbl_product";
    $cond = "product_id ='$id'";
  
      $categorymodel =$this->load->model('categorymodel');
      $result= $categorymodel->deleteproduct($table,$cond);
      if($result==1){
        $message['msg']="Xoá sản phẩm thành công!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
      }else{
        $message['msg']="Xóa sản phẩm thất bại!!";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
  }

  public function update_product($id){
    $table = "tbl_product";
    $categorymodel =$this->load->model('categorymodel');
    $cond = "product_id ='$id'";
    $title=$_POST['product_title'];
    $price=$_POST['product_price'];
    $quanlity=$_POST['product_quanlity'];
    $desc=$_POST['product_desc'];
    $category=$_POST['category_product_id'];
    $image=$_FILES['product_image']['name'];
    $tmp_image=$_FILES['product_image']['tmp_name'];
    $div = explode('.',$image);
    $file_ext = strtolower(end($div));
    $unique_image = $div[0].time().'.'.$file_ext;
    $path_upload = "public/upload/product/".$unique_image;
    if($image){
      $data['productbyid']= $categorymodel->productbyid($table,$cond);
      foreach($data['productbyid'] as $key =>$value){
          $path_unlink = "public/upload/product/";
          unlink($path_unlink.$value['product_image']);
    
      }
      move_uploaded_file($tmp_image,$path_upload);
      $data =array(
        'product_title' =>$title,
        'product_image' =>$unique_image,
        'product_price' =>$price,
        'product_quanlity' =>$quanlity,
        'product_desc' =>$desc,
        'category_product_id' =>$category
      );
    }else{
      $data =array(
        'product_title' =>$title,
        // 'product_image' =>$unique_image,
        'product_price' =>$price,
        'product_quanlity' =>$quanlity,
        'product_desc' =>$desc,
        'category_product_id' =>$category
      );
    }

   
   $result = $categorymodel->updatetproduct($table,$data,$cond);
   if($result==1){
  
     $message['msg']="Cập nhật phẩm thành công!!";
     header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
   }else{
     $message['msg']="Cập nhật phẩm thất bại!!";
     header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));         
     }
  }

      public function insert_category(){
       $title=$_POST['category_product_title'];
       $desc=$_POST['category_product_desc'];
       $table = "tb_category_product";
       $image=$_POST['category_product_images'];

       $data =array(
         'category_product_title' =>$title,
         'category_product_desc' =>$desc,
         'category_product_images' =>$image
       );
       $categorymodel =$this->load->model('categorymodel');
       $result = $categorymodel->insertcategory($table,$data);
       if($result==1){
         $message['msg']="Thêm danh mục sản phẩm thành công!!";
         header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
       }else{
         $message['msg']="Thêm danh mục sản phẩm thất bại!!";
         header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));          }
     }
     public function edit_product($id){
      $table = "tbl_product";
      $table_category = "tb_category_product";
      $cond = "product_id ='$id'";

      $categorymodel =$this->load->model('categorymodel');
      $data['productbyid']= $categorymodel->productbyid($table,$cond);
      $data['category']= $categorymodel->category($table_category);

      $this->load->view("admin/header");
      $this->load->view("admin/menu");
      $this->load->view("admin/product/edit_product",$data);
      $this->load->view("admin/footer");
    }

       
        public function list_category(){
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
            $table = "tb_category_product";
            $categorymodel =$this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);
            $this->load->view("admin/product/list_category",$data);
            $this->load->view("admin/footer");
        }
        public function delete_category($id){
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
            $categorymodel =$this->load->model('categorymodel');
            $result= $categorymodel->categorydelete($table,$cond);
            if($result==1){
              $message['msg']="Xoá danh mục sản phẩm thành công!!";
              header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }else{
              $message['msg']="Xóa danh mục sản phẩm thất bại!!";
              header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
          }
        }



        public function edit_category($id){
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
          $categorymodel =$this->load->model('categorymodel');
          $data['categorybyid']= $categorymodel->categorybyid($table,$cond);
          $this->load->view("admin/header");
          $this->load->view("admin/menu");
          $this->load->view("admin/product/edit_category",$data);
          $this->load->view("admin/footer");
        }
        public function update_category($id){
          $table = "tb_category_product";
          $cond = "category_product_id ='$id'";
          $title=$_POST['category_product_title'];
          $desc=$_POST['category_product_desc'];
          $image=$_POST['category_product_images'];
          if($image){
            $data =array(
              'category_product_title' =>$title,
              'category_product_desc' =>$desc,
              'category_product_images' =>$image
            );
          }else{
            $data =array(
              'category_product_title' =>$title,
              'category_product_desc' =>$desc,
             
            );
          }
          $categorymodel =$this->load->model('categorymodel');
          $result= $categorymodel->updatecategory($table,$data,$cond);
          if($result==1){
            $message['msg']="Cập nhật sản phẩm thành công!!";
            header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Cập nhật phẩm thất bại!!";
            header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
        }
        }
    }
?>