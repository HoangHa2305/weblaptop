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
        <title>Đơn hàng của bạn</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/item.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php include('menu.php'); ?>
        <!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
                
        <div class="panel panel-default">                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ngày mua</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($_SESSION['name'])){
                                        $name = $_SESSION['name'];
                                        $conn1 = mysqli_connect("localhost","root","","giuaki");
                                        $sql1 = "SELECT * FROM username WHERE hoten = '$name'";
                                        $ketqua1 = mysqli_query($conn1,$sql1);
                                        $row1 = mysqli_fetch_array($ketqua1);
                                        $id = $row1['id'];

                                        echo '<tr>';
                                        echo '  <a style="color: #FF9966;" href="lichsudonhang.php?id='.$id.'">Xem lịch sử đặt hàng</a>';
                                        echo '</tr>';

                                        $stt =1;
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql = "SELECT * FROM donhang WHERE idkhachhang = $id";
                                        $ketqua = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($ketqua)){
                                            echo '<tr class="success">';
                                            echo '  <td>'.$stt.'</td>';
                                            echo '  <td>'.$row['ngaymua'].'</td>';
                                            echo '  <td>'.number_format($row['tongtien']).' VNĐ</td>';
                                            echo '  <td>'.$row['trangthai'].'</td>';
                                            echo '  <td><a href="chitietdonhang.php?id='.$row['id'].'" style="color:#007b5e;">Xem chi tiết đơn hàng</a></td>';
                                            echo '  <td><a href="danhanduochang.php?id='.$row['id'].'" style="color: #CD1076;"> Đã nhận được hàng </a></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            $stt++;
                                        }
                                    }else{
                                        echo '<p style="text-align: center;color: #007b5e;">Bạn cần đăng nhập trước khi xem đơn hàng</p>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
