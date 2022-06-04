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
        <title>Tất cả sản phẩm</title>
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
                    <h1 class="display-4 fw-bolder">Tất cả sản phẩm</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Sản phẩm tốt nhất</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <form action="" class="search-bar" style="margin-bottom: -80px;">
            <input type="search" name="search" pattern=".*\S.*" required>
            <button class="search-btn" type="submit">
                <span>Search</span>
            </button>
        </form>
        <?php 
             $conn = mysqli_connect("localhost","root","","giuaki");
             $tong = mysqli_query($conn,"SELECT count(id) as total FROM hanghoa");
             $row2 = mysqli_fetch_assoc($tong);
             $tongsanpham = $row2['total'];
             $tranghientai = isset($_GET['page'])? $_GET['page'] : 1;
             $limit = 8;
             $tongsotrang = ceil($tongsanpham/$limit);
             if($tranghientai > $tongsotrang){
                 $tranghientai = $tongsotrang;
             }elseif($tranghientai<1){
                 $tranghientai = 1;
             }
             $start = ($tranghientai -1)* $limit;
             $sql = "SELECT * FROM hanghoa ORDER BY id DESC LIMIT $start,$limit";
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
                        if(isset($_GET['search']))
                        {
                            $search = $_GET['search'];
                            $conn1 = mysqli_connect("localhost","root","","giuaki");
                            $sql1 = "SELECT * FROM hanghoa WHERE tenhang LIKE '%$search%'";
                            $ketqua1 = mysqli_query($conn1,$sql1);
                            $row1 = mysqli_fetch_array($ketqua1) ;
                            if($row1 > 1){                        
                                while($row1 = mysqli_fetch_array($ketqua1))
                                {   
                                    echo '<div class="col mb-5">';
                                    echo '<div class="card h-100">';
                                    echo '<img class="card-img-top" src=" image/'.$row1['hinhanh'].'" alt="..." />';
                                    echo '<div class="card-body p-4">';
                                    echo '<div class="text-center">';
                                    echo '<h5 class="fw-bolder">'.$row1['tenhang'].'</h5>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                                    echo '<p style="text-align: center;">'.number_format($row1['dongia']).' VNĐ</p>';
                                    echo '<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="addcart.php?item='.$row1['id'].'">Mua hàng</a></div>';
                                    echo '<a href="../giuaki/item.php?id='.$row1['id'].'&&danhmuc='.$row1['danhmuc'].'" style=";text-decoration: none;margin-left: 47px;color: #007b5e;">Xem chi tiết</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';     
                                } 
                            }else{
                                echo 'Không tìm thấy kết quả';
                            }
                        }
                        else{
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
                        }
                    ?>
                    <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php 
                                if($tranghientai>1 && $tongsotrang >1){ 
                                    echo '<li class="page-item"><a class="page-link" style="color:#007b5e;" href="productall.php?page='.($tranghientai - 1).'"><i class="bi bi-arrow-left-circle"></i></a></li>';
                                }
                                for($i =1 ; $i <= $tongsotrang;$i++){
                                    if($i == $tranghientai){
                                        echo '<li class="page-item active">
                                                <a class="page-link" style="background-color: #007b5e;border-color:#007b5e;">'.$i.' <span class="sr-only"></span></a>
                                            </li>';
                                    }else{
                                        echo '<li class="page-item"><a class="page-link" style="color:#007b5e;" href="productall.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                                if($tranghientai < $tongsotrang && $tongsotrang>1){
                                    echo '<li class="page-item"><a class="page-link" style="color:#007b5e;" href="productall.php?page='.($tranghientai + 1).'"><i class="bi bi-arrow-right-circle"></i></a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
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
