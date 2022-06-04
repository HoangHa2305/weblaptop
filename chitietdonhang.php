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
        <title>Chi tiết đơn hàng</title>
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
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $id = $_GET['id'];
                                        $stt =1;
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql = "SELECT * FROM chitietdonhang WHERE iddonhang = $id";
                                        $ketqua = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($ketqua)){
                                            echo '<tr class="success">';
                                            echo '  <td>'.$stt.'</td>';
                                            echo '  <td><img src=" image/'.$row['hinhanh'].'" style="width: 50px; height: 50px;" /> </td>';
                                            echo '  <td>'.$row['tensanpham'].'</td>';
                                            echo '  <td>'.$row['soluong'].'</td>';
                                            echo '</tr>';
                                            $stt++;
                                            $total = $row['dongia'];
                                        }
                                        echo '<tr>';
                                        echo '  <td></td>';
                                        echo '  <td></td>';
                                        echo '  <td style="text-align: right;"><b>Tổng tiền: </b></td>';
                                        echo '  <td>'.number_format($total).' VNĐ</td>';
                                        echo '</tr>';
                                    ?>
                                    </tbody>
                                </table>
                                <?php 
                                    $khachhang = $_SESSION['name'];
                                    $conn1 = mysqli_connect("localhost","root","","giuaki");
                                    $sql1 = "SELECT * FROM username WHERE hoten= '$khachhang'";
                                    $ketqua1 = mysqli_query($conn1,$sql1);
                                    $row1 = mysqli_fetch_array($ketqua1);
                                    echo '<b>Địa chỉ nhận hàng:</b> '.$row1['diachi'];
                                    echo '<br>';
                                    echo '<b>Số điện thoại nhận hàng:</b> '.$row1['sdt'];
                                    echo '<br>';

                                    $conn2 = mysqli_connect("localhost","root","","giuaki");
                                    $sql2 = "SELECT * FROM donhang WHERE id= $id";
                                    $ketqua2 = mysqli_query($conn2,$sql2);
                                    $row2 = mysqli_fetch_array($ketqua2);
                                    echo '<b>Trạng thái đơn hàng:</b> '.$row2['trangthai'];
                                ?>
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
