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
        <title>Lịch sử đơn hàng</title>
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
                            <h2 style="text-align: center;">Lịch sử đặt hàng</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $tenkhachhang = $_SESSION['name'];
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql1 = "SELECT * FROM username WHERE hoten = '$tenkhachhang'";
                                        $ketqua1 = mysqli_query($conn,$sql1);
                                        $row1 = mysqli_fetch_array($ketqua1);
                                        $idkhachhang = $row1['id'];


                                        $stt =1;
                                        $sql = "SELECT * FROM chitietdonhang WHERE idkhachhang = $idkhachhang";
                                        $ketqua = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($ketqua)){
                                            echo '<tr class="success">';
                                            echo '  <td>'.$stt.'</td>';
                                            echo '  <td><img src=" image/'.$row['hinhanh'].'" style="width: 50px; height: 50px;" /> </td>';
                                            echo '  <td>'.$row['tensanpham'].'</td>';
                                            echo '  <td>'.$row['soluong'].'</td>';
                                            echo '  <td><a href="xoalichsu.php?id='.$row['Id'].'" style="color: #DF0029;"><i class="bi bi-pin-angle-fill"></i></a></td>';
                                            echo '</tr>';
                                            $stt++;
                                            $total = $row['dongia'];
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
