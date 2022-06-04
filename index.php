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
        <title>Trang chủ</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/index.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
            <?php include('menu.php'); ?>   
        <!-- Header-->
        <header class="py-5" 
        style="background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-image: url('https://dlcdnimgs.asus.com/websites/VN/aboutasus/VN-2.jpg');">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5  rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold" style="color: #007b5e;">Cửa hàng laptop</h1>
                        <p class="fs-4" style="color: #007b5e;">We Believe in Service, and you Know that – Chúng tôi tin vào dịch vụ của mình, và bạn biết điều đó</p>
                        <a class="btn btn-primary btn-lg" href="contact.php" style="background-color: #007b5e;border-color: #007b5e;">Liên hệ với chúng tôi</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature  text-white rounded-3 mb-4 mt-n4" style="background-color: #007b5e;"><i class="bi bi-house-door-fill"></i></div>
                                <h2 class="fs-4 fw-bold">Địa chỉ</h2>
                                <p class="mb-0">470 Trần Đại Nghĩa,Đà Nẵng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature  text-white rounded-3 mb-4 mt-n4" style="background-color: #007b5e;"><i class="bi bi-calendar-event"></i></div>
                                <h3 class="fs-4 fw-bold">Mở cửa</h3>
                                <p class="mb-0">8:00 - 20:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Sản phẩm mới nhất</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                    $ok =1;
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $k => $v){
                            if(isset($v)){
                                $ok = 2;
                            }
                        }
                    }
                    $dem = 0;
                    $conn = mysqli_connect("localhost","root","","giuaki");
                    $sql = "SELECT * FROM hanghoa ORDER BY id DESC";
                    $ketqua = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($ketqua)){
                        echo ' <div class="col mb-5">';
                        echo '<div class="card h-100">';
                        echo '<img class="card-img-top" src=" image/'.$row['hinhanh'].'" alt="..." />';
                        echo '<div class="card-body p-4">';
                        echo ' <div class="text-center">';
                        echo '<h5 class="fw-bolder">'.$row['tenhang'].'</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                        echo '<p style="text-align: center;">'.number_format($row['dongia']).' VNĐ</p>';
                        echo '<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="addcart.php?item='.$row['id'].'">Mua hàng</a></div>';
                        echo '<a href="../giuaki/item.php?id='.$row['id'].'&&danhmuc='.$row['danhmuc'].'" style=";text-decoration: none;margin-left: 52px;color: #007b5e;">Xem chi tiết</a>';
                        echo ' </div>';
                        echo ' </div>';
                        echo ' </div>';
                        $dem ++;
                        if($dem==4){
                            break;
                         }
                    }
                ?>
                </div>
            </div>
        </section>
        <script type="text/javascript" src="jquery-2.1.1.min.js"></script>
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
