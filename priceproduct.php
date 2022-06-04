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
        <title>Sản phẩm theo giá</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/product.css" rel="stylesheet" />
        <link href="css/search.css" rel="stylesheet" />
        
    </head>
    <body>
        <!-- Navigation-->
        <?php include('menu.php'); ?>
        <!-- Header-->
        <header class="py-5" style="background-color: #007b5e;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Sản phẩm theo giá</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Sản phẩm tốt nhất</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <?php 
            $dongia = $_GET['gia'];
            $conn = mysqli_connect("localhost","root","","giuaki");
            if($dongia == 1){
                $sql = "SELECT * FROM hanghoa WHERE dongia<20000000 ORDER BY id DESC ";
            }elseif($dongia ==2){
                $sql = "SELECT * FROM hanghoa WHERE 20000000<=dongia AND dongia<=40000000 ORDER BY id DESC ";
            }elseif($dongia ==3){
                $sql = "SELECT * FROM hanghoa WHERE dongia>40000000 ORDER BY id DESC ";
            }
 
             $ketqua = mysqli_query($conn,$sql);
        ?>
        <section class="py-5">
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" style="background-color: white;color:#007b5e;margin-left: 50px;border-color: white;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Số sản phẩm mỗi trang
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" style="color:#007b5e;" href="numberproduct.php?number=5">5</a></li>
                            <li><a class="dropdown-item" style="color:#007b5e;" href="numberproduct.php?number=10">10</a></li>
                            <li><a class="dropdown-item" style="color:#007b5e;" href="numberproduct.php?number=15">15</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" style="background-color: white;color:#007b5e;margin-left: 50px;border-color: white;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Lọc theo giá
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" style="color:#007b5e;" href="priceproduct.php?gia=1">Dưới 20 triệu</a></li>
                            <li><a class="dropdown-item" style="color:#007b5e;" href="priceproduct.php?gia=2">20 - 40 triệu</a></li>
                            <li><a class="dropdown-item" style="color:#007b5e;" href="priceproduct.php?gia=3">Trên 40 triệu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php 
                            while($row = mysqli_fetch_array($ketqua)){
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
                                echo '<a href="../giuaki/item.php?id='.$row['id'].'&&danhmuc='.$row['danhmuc'].'" style=";text-decoration: none;margin-left: 47px;color: #007b5e;">Xem chi tiết</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                    ?>
                </div> 
            </div>
        </section>
        <?php  include('../giuaki/html/scroll.html'); ?>
        <!-- Footer-->
        <footer class="py-5" style="background-color: #007b5e;">
            <div class="container"><p class="m-0 text-center text-white">HoangHa.Co - My Website</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
            
        </script>
    </body>
</html>
