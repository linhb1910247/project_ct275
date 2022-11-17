
<?php 
//tuong tac csdl, goi tat ca nhung gi co trong dmodel
    class homemodel extends Dmodel {
       public function __construct(){
           parent::__construct();
        }
     
        public function search_product($table_product,$table,$tukhoa){
        $sql= "SELECT * FROM  $table_product,$table  WHERE $table_product.category_product_id=$table.category_product_id
        AND $table_product.product_title   LIKE '%".$tukhoa."%' OR $table_product.category_product_id=$table.category_product_id AND $table_product.product_price LIKE '%".$tukhoa."%' "   ;
         
            return  $this->db->select($sql);
         
        }
        
    }

?>