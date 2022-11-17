<?php
    class index extends Dcontroller{
    
       public function __construct(){
        $data= array();
             parent::__construct();
        }
        public function index(){
            $this->homepage();
        }
        public function homepage(){
            Session::init();
            $table_product= 'tbl_product';
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/slider',$data);
            $this->load->view('HLshop/home',$data);
            $this->load->view('HLshop/footer');
        }
        public function search(){
            Session::init();
            $table_product= 'tbl_product';
            $table ='tb_category_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
            $data['list_product'] = $categorymodel->list_product_home($table_product);
            $homemodel = $this->load->model('homemodel');
            if(isset($_POST['tukhoa'])){
                $tukhoa=$_POST["tukhoa"];
            }else{
                $tukhoa='';
            }
            $data['search_list'] = $homemodel->search_product($table_product,$table,$tukhoa);
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/search',$data);
            $this->load->view('HLshop/footer');
        }
        public function notfound(){
            Session::init();
            $table ='tb_category_product';
           
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] =$categorymodel->category_home($table);
          
            $this->load->view('HLshop/header',$data);
            $this->load->view('HLshop/slider');
            $this->load->view('HLshop/404');
            $this->load->view('HLshop/footer');
        }
       
        
    }
?>