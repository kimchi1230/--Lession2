<?php
    class category extends Controller{
        public function show1($page=1){
            $page = (int) $page;
            if($page == 0){
                $page = 1;
            }
            $limit = 10;
            $start = ( $page - 1 ) * $limit;
            $get_category = $this->model("category_model")->get_cate1($start);
            $number_category = $this->model("category_model")->get_number_cate();
            $this->view("category_view",["cate"=>$get_category,"number_category" => $number_category]);
        }
        function addcategory(){
            $port = $_SERVER['SERVER_PORT'];
            if(isset($_POST['btnAdd1'])){
                $name=$_POST['cate_name'];
            }

           $re = $this->model("category_model")->addcategory($name);

           if($re){
                header("Location: http://localhost:$port/PV_1/category");
           }
        }
        function checkcategory($id){
            $port = $_SERVER['SERVER_PORT'];
            $re=false;
            $re_delete=false;
            if(isset($_POST['btnUpdate'])){
                $name=trim($_POST['category_name_update']);
                $re = $this->model("category_model")->updatecategory($id,$name);
                
            }
            if($re){
                header("Location: http://localhost:$port/PV_1/category");
            }
            if(isset($_POST['btnDelete'])){
                $re_delete= $this->model("category_model")->delete_category($id);
            }
            if($re_delete){
                header("Location: http://localhost:$port/PV_1/category");
             }
        }
    }

?>