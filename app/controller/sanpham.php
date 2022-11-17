<?php
    class sanpham extends Dcontroller{
     
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        
     
        public function tatca(){
            Session::init();
            $table= 'tb_category_product';
            $table_product= 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/shop',$data);
            $this->load->view('HLshop/footer');
        }
        public function danhmuc($id){
            Session::init();
            $table= 'tb_category_product';
            $table_product= 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_by_id'] = $categorymodel->categorybyid_home($table,$table_product,$id);
            
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/categoryproduct',$data);
            $this->load->view('HLshop/footer');
        }
        public function chitietsanpham($id){
            Session::init();
            $table= 'tb_category_product';
            $table_product= 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $cond = "$table_product.category_product_id = $table.category_product_id AND $table_product.product_id='$id'";
            $data['detail_product'] = $categorymodel->detail_product_home($table,$table_product,$cond);

            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/details_product',$data);
            $this->load->view('HLshop/footer');
        }
    }
?>