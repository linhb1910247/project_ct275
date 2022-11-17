<?php
    class cart extends Dcontroller{
     
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        public function index(){
           $this->cart();
        }
        public function dathang(){
            Session::init();
            $table ='tb_category_product';
           
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $table_customers ='tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $id=Session::get('customers_id');
            $data_info['customer'] =  $customermodel->customer_info($table_customers,$id);
            $this->load->view('HLshop/header',$data);
            // $this->load->view('HLshop/slider');
            $this->load->view('HLshop/dathang',$data_info);
            $this->load->view('HLshop/footer');
        }
       
        public function cart(){
            Session::init();    
            // Session::chesksession_customer();
            $table ='tb_category_product';
           
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            
            $this->load->view('HLshop/header',$data);
            // $this->load->view('HLshop/slider');
            $this->load->view('HLshop/cart',$data);
            $this->load->view('HLshop/footer');
        }
        public function addtocart(){
            Session::init();
            // Session::destroy();
            if(isset($_SESSION["addtocart"])){
                $available=0;
               //neu ton tai cart ma trung thi tang so luong
               //neu ton tai khong trung sp thi add du lieu them vao
                foreach($_SESSION["addtocart"] as $key => $value){
                   
                    if($_SESSION["addtocart"][$key]['id_product']== $_POST["id_product"]){
                      //neu trung available tang len sẽ khac 0 khong them du lieu nua
                        $available=$available+1;
                        $_SESSION["addtocart"][$key]['quanlity_product']= $_SESSION["addtocart"][$key]['quanlity_product'] + $_POST["quanlity_product"];
                    }
                } 
                    if($available==0){
                        $item= array(
                        'id_product' => $_POST["id_product"],
                        'title_product' => $_POST["title_product"],
                        'image_product' => $_POST["image_product"],
                        'price_product' => $_POST["price_product"],
                        'quanliti' => $_POST["quanliti"],
                        'quanlity_product' => $_POST["quanlity_product"]
                        );
                        $_SESSION["addtocart"][]=$item;
                    }
                
                }else{
                    //chuoi mang du lieu
                    $item= array(
                        'id_product' => $_POST["id_product"],
                        'title_product' => $_POST["title_product"],
                        'image_product' => $_POST["image_product"],
                        'price_product' => $_POST["price_product"],
                        'quanliti' => $_POST["quanliti"],
                        'quanlity_product' => $_POST["quanlity_product"]
                    );
                    $_SESSION["addtocart"][]=$item;
                     }
                header("Location:".BASE_URL.'/cart');
        }
        public function updatecart(){
            Session::init();
            $table_product = "tbl_product";
            if(isset($_POST['delete_cart'])){
                if(isset($_SESSION["addtocart"])){
                    foreach($_SESSION["addtocart"] as $key => $value){
                        if($_SESSION["addtocart"][$key]['id_product']== $_POST["delete_cart"]){ 
                              unset($_SESSION["addtocart"][$key]);
                              $message['msg']="Xóa Thành công!!";
                          }
                          if($_SESSION["addtocart"]==null){
                            unset($_SESSION["addtocart"]);
                            $message['msg']="Vỏ hàng trống!!";
                            header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
               
                          }
                         
                     }
                     header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
               
              }else{
                  header("Location:".BASE_URL);
                 }
            }else{
                foreach($_POST['qty'] as $key => $qty){
                    foreach($_SESSION["addtocart"] as $section => $value){
                        if($value['id_product'] == $key && $qty >=1){
                            $_SESSION["addtocart"][$section]['quanlity_product'] =$qty;
                            $message['msg']="Cập nhật thành công!!";
                        }
                        if($value['id_product'] == $key && $qty <= 0 ){
                            unset($_SESSION["addtocart"][$section]);
                        }
                        if($_SESSION["addtocart"]==null){
                            unset($_SESSION["addtocart"]);
                            $message['msg']="Vỏ hàng trống!!";
                            
               
                          }
                    }
                    header('Location:'.BASE_URL."/cart?msg=".urlencode(serialize($message)));
                }
         
            }
          
                
    }
  
}   
?>