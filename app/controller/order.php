<?php
  require './vendor/autoload.php';
  use Gregwar\Captcha\CaptchaBuilder;
  use Gregwar\Captcha\PhraseBuilder;
    class order extends Dcontroller{
        function __construct(){
            // Session::chesksession();
             parent::__construct();
        }
        public function index(){
            $this->order();
        }
        public function order(){ 
            Session::chesksession_customer();
            $table_order='tbl_order';
            $ordermodel = $this->load->model('ordermodel');
            $data['order']= $ordermodel ->list_order($table_order);
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
           $this->load->view("admin/order/order",$data);
           $this->load->view("admin/footer");
        }
        public function add_order(){ 
            Session::chesksession_customer();
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
           $this->load->view("admin/order/add_order");
           $this->load->view("admin/footer");
        }
        public function order_details($order_code){
            Session::chesksession_customer();
            $table_order_details='tbl_order_details';
            $table_product='tbl_product';
           
            $cond = "$table_product.product_id = $table_order_details.order_product_id AND order_code='$order_code'";
            $ordermodel = $this->load->model('ordermodel');
            $data['order_details']= $ordermodel ->list_order_details($table_product,$table_order_details,$cond);
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
           $this->load->view("admin/order/order_details",$data);
           $this->load->view("admin/footer");
        }
        public function order_confirm($order_code){
            Session::chesksession_customer();
            $ordermodel = $this->load->model('ordermodel');
            $table_order='tbl_order';
            $cond= "$table_order.order_code ='$order_code'";
            $data = array(
                'order_status' => 1
            );
            $result= $ordermodel ->order_confirm($table_order,$data,$cond);
            if($result==1){
             
                $message['msg']="Đã xử lí đơn hàng thành công!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
              }else{
                $message['msg']="Đã xử lí đơn hàng thất bại!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            }
        }
        public function order_delete($order_code){
            Session::chesksession_customer();
            $table_order='tbl_order';
            $cond= "$table_order.order_code ='$order_code'";
          
              $ordermodel = $this->load->model('ordermodel');
              $result= $ordermodel->deleteorder($table_order,$cond);
              if($result==1){
                $message['msg']="Xoá đơn hàng thành công!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
              }else{
                $message['msg']="Xóa đơn hàng thất bại!!";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            }
        }
        public function customer_order($id){
            Session::chesksession_customer();
         $table ='tb_category_product';
         $categorymodel = $this->load->model('categorymodel');
         $data['category'] =$categorymodel->category_home($table);
         
            
             $table_order='tbl_order';
             
             $ordermodel = $this->load->model('ordermodel');
             $cond=" $table_order.customers_id ='$id'"  ;
             $data['order_details']= $ordermodel ->ordercustomerbyid($table_order,$cond);
             $this->load->view("HLshop/header",$data); 
            $this->load->view("HLshop/customer_order",$data);
            $this->load->view("HLshop/footer");
         }
         public function customer_orderdetails($order_code){
            Session::chesksession_customer();
             $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
           $table_order_details='tbl_order_details';
           $table_product='tbl_product';
           $table_order='tbl_order';
           $ordermodel = $this->load->model('ordermodel');
           $cond=" $table_product.product_id = $table_order_details.order_product_id 
                  AND $table_order.order_code = $table_order_details.order_code and $table_order_details.order_code ='$order_code'"  ;
           $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$table_product,$table_order_details,$cond);
           $this->load->view("HLshop/header",$data);   
          $this->load->view("HLshop/customer_orderdetails",$data);
          $this->load->view("HLshop/footer");
       }
       public function canncel_order(){
        $ordermodel = $this->load->model('ordermodel');
        $table_order='tbl_order';
        
        $id=$_POST['customers_id'];
        $order_code=$_POST['code'];
        $cancel=$_POST['cancel'];
        $cond= "$table_order.order_code ='$order_code'";
        $data = array(
            'cancel' =>$cancel,
        );
        $result= $ordermodel ->order_confirm($table_order,$data,$cond);
        if($result==1){
          
            header('Location:'.BASE_URL."/order/customer_order/".$id);

          }
       }
       public function cancelorder_confirm($order_code){
        $ordermodel = $this->load->model('ordermodel');
        $table_order='tbl_order';
        $cond= "$table_order.order_code ='$order_code'";
        $table_order_details='tbl_order_details';
        $table_product='tbl_product';
        $categorymodel =$this->load->model('categorymodel');
        $cond_order_details=" $table_product.product_id = $table_order_details.order_product_id 
               AND $table_order.order_code = $table_order_details.order_code and $table_order_details.order_code ='$order_code'"  ;
              

        $data = array(
            'order_status' => 2
        );
        $result= $ordermodel ->order_confirm($table_order,$data,$cond);
        if($result==1){
            $data['order_details']= $ordermodel ->ordercetailscustomerbyid($table_order,$table_product,$table_order_details,$cond_order_details);
            foreach($data['order_details'] as $key =>$details){
                $quanlity= $details['product_quanlity'] + $details['order_product_quanlity'];
                $id_product=$details['order_product_id'];
                $order_code=$details['order_code'];
                $cond_product = "product_id ='$id_product'";
                
                $data =array(
                    'product_quanlity' =>$quanlity,    
                  );
                  $categorymodel->updatetproduct($table_product,$data,$cond_product);
                
            }
            $message['msg']="Xác nhận thành công!!";
            header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
          }else{
            $message['msg']="Xác nhận thành công  thất bại!!";
            header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
        }
       }
        
    }
?>