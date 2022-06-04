<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chi tiết sản phẩm</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/item.css" rel="stylesheet" />
        <style>
            .thumbnail {
                width: 500px;
                height: 300px;
                overflow: hidden;
            }

            .thumbnail img {
                width: 100%;
                height: 100%;
                transition-duration: 0.3s;
            }

            .thumbnail img:hover {
                transform: scale(1.2);
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <?php include('menu.php'); ?>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <?php 
                        $idhanghoa = $_GET['id'];
                        $conn = mysqli_connect("localhost","root","","giuaki");
                        $sql = "SELECT * FROM hanghoa WHERE id = $idhanghoa ";
                        $ketqua = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($ketqua);
                        $tenhanghoa = $row['tenhang'];
                            echo '<div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src=" image/'.$row['hinhanh'].'" alt="..." /></div>';
                            echo '<div class="col-md-6">';
                            echo '<h1 class="display-5 fw-bolder">'.$row['tenhang'].'</h1>';
                            echo '<div class="fs-5 mb-5">';
                            echo '</div>';
                            echo '<p class="lead">'.$row['mota'].'</p>';
                            echo '<span style="font-size:20px;"><b>Giá :</b> '.number_format($row['dongia']).' VNĐ</span>';
                            echo '<br>';
                            echo '<br>';
                            echo '<div class="d-flex">';
                            echo '<input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />';
                            echo '<a href="addcart.php?item='.$row['id'].'" >';
                            echo '<button class="btn btn-outline-dark flex-shrink-0" type="button">';
                            echo '<i class="bi-cart-fill me-1"></i>';
                            echo 'Mua hàng ';
                            echo '</button>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div>';
                            //$conn1 = mysqli_connect("localhost","root","","giuaki");
                            $sql1 = "SELECT * FROM chitietsanpham WHERE tenhanghoa = '$tenhanghoa' ";
                            $ketqua1 = mysqli_query($conn,$sql1);
                            $row = mysqli_fetch_array($ketqua1);
                            echo '<div class ="thumbnail">';
                            echo '<img class="card-img" style="width:140px;height:120px;border:1px solid #A0A0A0;margin-left: 15px;margin-top: 20px;" src=" image/'.$row['hinh1'].'" alt="..." />';
                            echo '<img class="card-img" style="width:140px;height:120px;border:1px solid #A0A0A0;margin-left: 13px;margin-top: 20px;" src=" image/'.$row['hinh2'].'" alt="..." />';
                            echo '<img class="card-img" style="width:140px;height:120px;border:1px solid #A0A0A0; margin-left: 13px;margin-top: 20px;" src=" image/'.$row['hinh3'].'" alt="..." />';
                            echo '</div>';
                            echo '</div>';
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Sản phẩm cùng hãng</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                        $dem = 0;
                        $danhmucsanpham = $_GET['danhmuc'];
                        $conn = mysqli_connect("localhost","root","","giuaki");
                        $sql = "SELECT * FROM hanghoa WHERE danhmuc = $danhmucsanpham ";
                        $ketqua = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($ketqua)){
                            $dem++;
                            echo '<div class="col mb-5">';
                            echo '<div class="card h-100">';
                            echo '<img class="card-img-top" src=" image/'.$row['hinhanh'].'" alt="..." />';
                            echo '<div class="card-body p-4">';
                            echo '<div class="text-center">';
                            echo '<h5 class="fw-bolder">'.$row['tenhang'].'</h5>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                            echo '<p style="text-align: center;">'.number_format($row['dongia']).' VNĐ</p>';
                            echo '<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="addcart.php?item='.$row['id'].'">Mua hàng</a></div>';
                            echo '<a href="../giuaki/item.php?id='.$row['id'].'&&danhmuc='.$row['danhmuc'].'" style=";text-decoration: none;margin-left: 52px;color: #007b5e;">Xem chi tiết</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            if($dem==4){
                               break;
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php  include('../giuaki/html/scroll.html'); ?>
        <!-- Footer-->
        <?php 
            include('../giuaki/html/footer.html');
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
