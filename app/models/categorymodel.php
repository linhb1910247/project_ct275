
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class categorymodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
        public function category( $table){

            $sql ="SELECT * FROM $table ORDER BY category_product_id DESC";
           return $this->db->select($sql);

         }
         public function category_home( $table){
            $sql ="SELECT * FROM $table ORDER BY category_product_id DESC";
           return $this->db->select($sql);

         }
        public function categorybyid($table,$cond){
            $sql="SELECT * FROM $table WHERE $cond";     
            return $this->db->select($sql);
        }
        //lay san pham thuoc danh muc
        public function categorybyid_home($table,$table_product,$id){
            $sql="SELECT * FROM $table,$table_product WHERE $table.category_product_id = $table_product.category_product_id AND $table_product.category_product_id= '$id' ORDER BY $table_product.product_id DESC";    
           
            return $this->db->select($sql);
        }
        public function detail_product_home($table,$table_product,$cond){
            $sql="SELECT * FROM $table,$table_product WHERE $cond";    
          
            return $this->db->select($sql);
        }
        public function list_product_home($table_product){
            $sql="SELECT * FROM $table_product ORDER BY $table_product.product_id DESC";    
           
            return $this->db->select($sql);
        }
        public function insertcategory($table,$data){
            return $this->db->insert($table,$data); 
          
        }
        public function updatecategory($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 
        }
        public function categorydelete($table,$cond){
            return $this->db->delete($table,$cond); 
        }
        //product
        public function insertproduct($table,$data){
            return $this->db->insert($table,$data); 
          
        }
        public function product( $table_product, $table_category){
            //goi select tu ddatabase va truyen gia ban vao 
            //JOIN 2 bản
            $sql ="SELECT * FROM $table_product,$table_category WHERE $table_product.category_product_id = $table_category.category_product_id ORDER BY  $table_product.product_id DESC";
           return $this->db->select($sql);

         }
         public function deleteproduct($table_product,$cond){
            return $this->db->delete($table_product,$cond); 
         }
         public function productbyid($table,$cond){
            $sql="SELECT * FROM $table WHERE $cond";    
            return $this->db->select($sql);
        }
        public function updatetproduct($table,$data,$cond){
            return $this->db->update($table,$data,$cond); 

        }

        
    }
  
?>

 