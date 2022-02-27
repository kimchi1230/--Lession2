<?php
    $total = mysqli_fetch_array($data['number_products']);
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
                <!--header navigation-->
                <div class="dd-flex justify-content-around">
                    <a class="btn btn-primary m-3" href="http://localhost:<?= $port ?>/PV_1/">PRODUCT</a>
                    <a class="btn btn-primary" href="http://localhost:<?= $port ?>/PV_1/category">CATEGORY</a>
                </div>
                <form action="./home/search_product/" method="POST">
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
                            PRODUCT NAME
                        </th>
                        <th>
                            CATEGORY
                        </th>
                        <th>IMAGE</th>
                        <th colspan="2">
                            OPERATION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetch data từ controller-->
                    <?php
                        $id=0;
                        while($row = mysqli_fetch_array($data['product'])){
                            $name_row = $row['name'];
                            $cate = $row['id_cate'];
                            $name_cate = $row['name_cate'];
                            $img = $row['img'];
                            $id_proc = $row['id'];
                            $id+=1;
                    ?>
                        <tr>
                            <td><span> <?php echo $id ?> </span></td>
                            <td><span id="name_row<?php echo $id_proc  ?>" > <?php echo $name_row ?> </span></td>
                            <td><span id="name_cate<?php echo $id_proc  ?>" > <?php echo $name_cate ?> </span></td>
                            <td>
                                <img id="src_img<?php echo $id_proc  ?>" class="img-thumbnail" src=<?php echo $img ?>>
                            </td>
                            <td>
                                <!-- Icon trigger pop up modal update product-->
                                <button  data-toggle="modal" data-target="#Modal_update" class="edit" value="<?php echo $id_proc  ?>">
                                    <i class="fa-solid fa-wrench"></i>
                                </button> 
                            </td>
                            <td >   
                                <!-- Icon trigger event delete product-->
                                <form action="http://localhost:<?= $port ?>/PV_1/home/checkproduct/<?php echo $id_proc  ?>" method="POST">
                                    <button name="btnDelete" onclick="return confirm('Are you sure to delete?')"><i class="fa-solid fa-trash"></i></button>  
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    <!--PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/home/show1/1">First</a></li>
                            <?php for($i=1;$i<=$page;$i++): 
                
                                ?>
                                <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/home/show1/<?php echo $i ?>"><?= $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="http://localhost:<?= $port ?>/PV_1/home/show1/<?php echo $page ?>">Last</a></li>
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
                            ADD PRODUCT
                        </div>
                        <div class="modal-body">
                            <form action="http://localhost:<?= $port ?>/PV_1/home/addproduct" method="POST">
                                <input class="m-2 form-control" type="text" name="product_name" placeholder="PRODUCT NAME">
                                <select class="m-2 form-control" id="catess" name="cate">
                                    <?php
                                        while($row1 = mysqli_fetch_array($data['cate'])){
                                            $id_cate = $row1['id_cate'];
                                            $name_cate1 = $row1['name_cate'];
                                    ?>
                                        <option value= <?php echo $id_cate ?>> <?php echo $name_cate1 ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input class="m-2 form-control" type="text" name="img_link" placeholder="IMGAGE LINK">
                                <button name="btnAdd" class="m-2 btn btn-primary"> ADD PRODUCT</button>         
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
                            UPDATE PRODUCT
                        </div>
                        <div class="modal-body">
                            <form id="modal_form"action="http://localhost:<?= $port ?>/PV_1/home/checkproduct/" method="POST">
                                <input class="m-2 form-control" type="text" name="product_name_update" id="m_name_row" placeholder="TÊN SẢN PHẨM">
                                <select class="m-2 form-control" name="cate_update" id="cate_update">
                                    <?php
                                        while($row1 = mysqli_fetch_array($data['cate_update'])){
                                            $id_cate = $row1['id_cate'];
                                            $name_cate1 = $row1['name_cate'];
                                    ?>
                                        <option value= <?php echo $id_cate ?>> <?php echo $name_cate1 ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input class="m-2 form-control" type="text" name="img_link_update" id="img_link_update" placeholder="IMGAGE LINK">
                                <button name="btnUpdate" class="m-2 btn btn-primary"> UPDATE PRODUCT</button>         
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
                var product_name_update1=$('#name_row' + id).text();
                var cate = $('#name_cate' + id).text();
                var img_link = document.getElementById('src_img' + id).getAttribute('src');
        
                $('#edit').modal('show');
                $("#catess").val(cate).change();
                $('#m_name_row').val(product_name_update1);
                $('#img_link_update').val(img_link);
                $('#modal_form').attr('action', 'http://localhost:<?= $port ?>/PV_1/home/checkproduct/'+id);
            });
        });
        </script>                 
    </body>
</html>