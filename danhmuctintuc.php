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
        <title>Tin tức</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/tintucall.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include('menu.php'); ?>  
        <!-- Page header with logo and tagline-->
        <header class="py-5 border-bottom mb-4" style="background-color: #007b5e;" >
            <div class="container" >
                <div class="text-center my-5" >
                    <h1 class="fw-bolder" style="color: white;">Tin tức về điện tử</h1>
                    <p class="lead mb-0" style="color: white;">We Believe in Service, and you Know that – Chúng tôi tin vào dịch vụ của mình, và bạn biết điều đó</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                            <?php
                                $stt = 0;
                                $tendanhmuc = $_GET['iddanhmuc'];
                                $conn2 = mysqli_connect("localhost","root","","giuaki");
                                $sql2 = "SELECT * FROM tintuc WHERE iddanhmuc = $tendanhmuc ";
                                $ketqua2 = mysqli_query($conn2,$sql2);
                                while($row2 = mysqli_fetch_array($ketqua2)){
                                    $noidung = $row2['noidung'];
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="card mb-4">';
                                    echo '<a href="#!"><img class="card-img-top" src="image/'.$row2['hinhminhhoa'].'" alt="..." /></a>';
                                    echo '<div class="card-body">';
                                    echo '<div class="small text-muted">'.$row2['thoigian'].'  '.$row2['ngay'].'</div>';
                                    echo '<h2 class="card-title h4">'.$row2['tieude'].'</h2>';
                                    echo '<p class="card-text">'.substr($noidung,0,50).'...</p>';
                                    echo '<a class="btn btn-primary" href="tintuc.php?id='.$row2['id'].'" style="background-color: #007b5e;border:#007b5e;">Read more →</a>';
                                    echo ' </div>';
                                    echo ' </div>';
                                    echo ' </div>';
                                }
                                
                            ?>
                            <!-- Blog post-->
                    </div>
                    <!-- Pagination-->
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #007b5e;color:aliceblue">Danh mục</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    <?php 
                                        $conn1 = mysqli_connect("localhost","root","","giuaki");
                                        $sql1 = "SELECT * FROM danhmuctintuc";
                                        $ketqua1 = mysqli_query($conn1,$sql1);
                                        while($row1 = mysqli_fetch_array($ketqua1)){
                                            echo '<li><a href="danhmuctintuc.php?iddanhmuc='.$row1['id'].'" style="color: #007b5e;">'.$row1['tendanhmuc'].'</a></li>';
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <img src="https://tanthanhdanh.vn/wp-content/uploads/2020/10/TTD_Promotion_2010_DealGiaHoi_LaptopLG_Poster.jpg">
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
        <?php  include('../giuaki/html/scroll.html'); ?>
        <!-- Footer-->
        <?php 
            include('../giuaki/html/footer.html');
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
