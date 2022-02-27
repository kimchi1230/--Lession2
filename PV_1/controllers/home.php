<?php
    class home extends Controller{
        /*function show($a,$b){
            $abc= $this->model("product")->abc($a,$b);
            $this->view("home",["tong"=>$abc]);
        }*/
        // function hiển thị data trong home
        function show1($page){
            $page = (int) $page;
            if($page == 0){
                $page = 1;
            }
            $limit = 10;
            $start = ( $page - 1 ) * $limit;
            $product = $this->model("product")->get_product($start);
            $category = $this->model("product")->get_cate();
            $number_products = $this->model("product")->get_number_products();
            $category_update = $this->model("product")->get_cate();
            $this->view("home",["product" => $product, "cate" => $category,"cate_update" => $category_update,"number_products" => $number_products ]);

        }
        // function thêm product
        function addproduct(){
            $port = $_SERVER['SERVER_PORT'];
            if(isset($_POST['btnAdd'])){
                $name=$_POST['product_name'];
                $id_cate=$_POST['cate'];
                $img_link = $_POST['img_link'];
            }

           $re = $this->model("product")->addproduct($name,$id_cate,$img_link);

           if($re){
                header("Location: http://localhost:$port/PV_1/");
           }
        }
        // function check product nếu được gửi lên sự kiện update và sự kiện xóa product
        function checkproduct($id){
            $re=false;
            $re_delete=false;
            if(isset($_POST['btnUpdate'])){
                $name=trim($_POST['product_name_update']);
                $id_cate=$_POST['cate_update'];
                $img_link = trim($_POST['img_link_update']);
                $re = $this->model("product")->updateproduct($id,$name,$id_cate,$img_link);
                
            }
            if($re){
                header("Location: http://localhost:8012/PV_1/");
            }else{
                echo "loi";
            }
            if(isset($_POST['btnDelete'])){
                $re_delete= $this->model("product")->deleteproduct($id);
            }
            if($re_delete){
                header("Location: http://localhost:8012/PV_1/");
             }
        }
        function search_product(){
            if(isset($_POST['btnSearch'])){
                $key_word = $_POST('input_search');
                $product = $this->model("product")->search_product($key_word);
                $this->view("home",["product1" => $product]);
            }
        }
    }
?>