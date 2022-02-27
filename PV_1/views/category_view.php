<?php
    $total = mysqli_fetch_array($data['number_category']);
    $page = ceil($total[0]/10);
    $prev = $page - 1;
    $next = $page + 1;
    $port = $_SERVER['SERVER_PORT'];
?>

<!DOCTYPE html>



<html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8cbb086b19.js" crossorigin="anonymous"></script>        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .img-thumbnail{
                max-width: 200px;
                max-height: 100px;
            }
            a{
                text-decoration: none;
                color: black;
            }

        </style>
    </head>
    <body>
        <div class="w-100">
            <div class="w-50">
                <div class="dd-flex justify-content-around">
                    <a class="btn btn-primary m-3" href="http://localhost:<?= $port ?>/PV_1/">PRODUCT</a>
                    <a class="btn btn-primary" href="http://localhost:<?= $port ?>/PV_1/category">CATEGORY</a>
                </div>
                <form action="./category/search_product/" method="POST">
                    <div class="p-3 input-group mb-3">
                        <input name="input_search" type="text" class="w-50 form-control" placeholder="SEARCH PRODUCT" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" name="btnSearch" type="button">SEARCH</button>
                        </div>
                    </div>
                </form>
                <!-- ICON trigger event pop up modal create product-->
                <div class="d-flex align-items-end flex-column">
                    <a href="#" data-toggle="modal" data-target="#Modal1">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
            <!-- table fetch dữ liệu-->
            <table class="table w-50">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            CATEGORY NAME
                        </th>
                        <th colspan="2">
                            OPERATION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetch data từ controller-->
                    <?php
                        $id=0;
                        while($row = mysqli_fetch_array($data['cate'])){
                            $cate_name_view = $row['name_cate'];
                            $id_cate = $row['id_cate'];
                            $id+=1;
                    ?>
                        <tr>
                            <td><span> <?php echo $id ?> </span></td>
                            <td><span id="name_row_cate<?php echo $id_cate  ?>" > <?php echo $cate_name_view ?> </span></td>
                            <td>
                                <!-- Icon trigger pop up modal update product-->
                                <button  data-toggle="modal" data-target="#Modal_update" class="edit" value="<?php echo $id_cate  ?>">
                                    <i class="fa-solid fa-wrench"></i>
                                </button> 
                            </td>
                            <td >   
                                <!-- Icon trigger event delete product-->
                                <form action="http://localhost:<?= $port ?>/PV_1/category/checkcategory/<?php echo $id_cate  ?>" method="POST">
                                    <button name="btnDelete" onclick="return confirm('if you delete this category which product belong to this category will deleted. Are you want to continue?')"><i class="fa-solid fa-trash"></i></button>  
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/category/show1/1">First</a></li>
                            <?php for($i=1;$i<=$page;$i++): 
                
                                ?>
                                <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/category/show1/<?php echo $i ?>"><?= $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/category/show1/<?php echo $page ?>">Last</a></li>
                        </ul>
                    </nav>

                </tbody>
            </table>
        </div>   
        <!--MODALllllllllllllllllllll-->
        <!-- Modal tạo một Product mới-->
        <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                        <div class="modal-header">
                            ADD CATEGORY
                        </div>
                        <div class="modal-body">
                            <form action="http://localhost:<?= $port ?>/PV_1/category/addcategory" method="POST">
                                <input class="m-2 form-control" type="text" name="cate_name" placeholder="CATEGORY NAME">
                                <button name="btnAdd1" class="m-2 btn btn-primary"> ADD CATEGORY</button>         
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal update một product-->
        <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                        <div class="modal-header">
                            UPDATE CATEGORY
                        </div>
                        <div class="modal-body">
                            <form id="modal_form"action="http://localhost:<?= $port ?>/PV_1/category/checkcategory/" method="POST">
                                <input class="m-2 form-control" type="text" name="category_name_update" id="m_name_row_cate" placeholder="CATEGORY NAME">
                                <button name="btnUpdate" class="m-2 btn btn-primary"> UPDATE CATEGORY</button>         
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
            $(document).on('click', '.edit', function(){
                var id=$(this).val();
                var cate_name_update1=$('#name_row_cate' + id).text();

                $('#edit').modal('show');
                $('#m_name_row_cate').val(cate_name_update1);
                $('#modal_form').attr('action', 'http://localhost:<?= $port ?>/PV_1/category/checkcategory/'+id);
            });
        });
        </script>                 
    </body>