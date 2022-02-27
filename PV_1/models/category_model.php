<?php
    class category_model extends DB{
        public function get_cate1($start){
            $limit=10;
            $qr = "SELECT * FROM category ORDER BY category.id_cate DESC LIMIT $start,$limit";
            return mysqli_query($this->con,$qr);
        }
        public function get_number_cate(){
            $qr = "SELECT count(id_cate) as id FROM category";
            return mysqli_query($this->con,$qr);
        }
        public function addcategory($name){
            $qr = "INSERT INTO category VALUES (null,'$name')";
            $result = false;
            if(mysqli_query($this->con,$qr)){
                $result = true;
            }
            return $result;
        }
        public function updatecategory($id,$name){
            $qr = "UPDATE category SET category.name_cate = '$name' WHERE category.id_cate = $id ";
            $result = false;
            if(mysqli_query($this->con,$qr)){
                $result = true;
            }
            return $result;
        }
        public function delete_category($id){
            $qr_proc = "DELETE FROM product WHERE id_cate='$id'";
            $result = false;
            if(mysqli_query($this->con,$qr_proc)){
                $qr = "DELETE FROM category WHERE id_cate='$id'";
                if(mysqli_query($this->con,$qr)){
                    $result = true;
                }
            }
            return $result;
        }
    }

?>