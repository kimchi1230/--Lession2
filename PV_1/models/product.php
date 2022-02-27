<?php
    class product extends DB{
        //model lấy product
        public function get_product($start){
            $limit = 10;
            $qr = "SELECT * FROM product,category WHERE product.id_cate=category.id_cate ORDER BY product.id DESC LIMIT $start,$limit  ";
            return mysqli_query($this->con,$qr);
        }
        public function get_number_products(){
            $qr = "SELECT count(id) as id FROM product";
            return mysqli_query($this->con,$qr);
        }
        //model lấy category
        public function get_cate(){
            $qr = "SELECT * FROM category ";
            return mysqli_query($this->con,$qr);
        }
        //model search product
        public function search_product($key_word){
            $qr = "SELECT * FROM product WHERE product.name like '%' + '$key_word' '%' ";
            return mysqli_query($this->con,$qr);
        }
        //model thêm mới product
        public function addproduct($name, $id_cate,$img_link){
            $qr = "INSERT INTO product VALUES (null,'$name', '$id_cate', '$img_link')";
            $result = false;
            if(mysqli_query($this->con,$qr)){
                $result = true;
            }
            return $result;
        }
        //model xóa product
        public function deleteproduct($id){
            $qr = "DELETE FROM product WHERE id='$id'";
            $result = false;
            if(mysqli_query($this->con,$qr)){
                $result = true;
            }
            return $result;
        }
        //model update thông tin product
        public function updateproduct($id,$name,$id_cate,$img_link){
            $qr = "UPDATE product SET product.name = '$name', product.id_cate = '$id_cate', product.img='$img_link' WHERE product.id = $id ";
            $result = false;
            if(mysqli_query($this->con,$qr)){
                $result = true;
            }
            return $result;
        }
    }
?>