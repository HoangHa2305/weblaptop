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
        <?php 
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $id = $_GET['id'];
            $tongtien = $_GET['tongtien'];
            $thumua = getdate();
            $ngay = date('d');
            $thang = date('m');
            $nam = date('Y');
            $ngaymua =  date('H:i:s d/m/Y');
            $trangthai = "Chưa thanh toán";
           
                $conn1 =  mysqli_connect("localhost","root","","giuaki");
                $sql1 = "INSERT INTO donhang(idkhachhang,ngaymua,tongtien,trangthai) VALUES ('$id','$ngaymua','$tongtien','$trangthai') ";
                $ketqua1 = mysqli_query($conn1,$sql1);

            $iddonhang = mysqli_insert_id($conn1);

            foreach($_SESSION['cart'] as $key => $value)
            {
                $item[] = $key;
            
            $str = implode(",",$item);
            $conn3 =  mysqli_connect("localhost","root","","giuaki");
            $sql3 = "SELECT * FROM hanghoa WHERE id in ($str) order by id desc";
            $ketqua3 = mysqli_query($conn3,$sql3);
            $row3 = mysqli_fetch_array($ketqua3);
                $hinhanh = $row3['hinhanh'];
                $tensanpham = $row3['tenhang'];
                $idmathang = $row3['id'];
                $soluong = $_SESSION['cart'][$row3['id']];
    
                $sql4 = "INSERT INTO chitietdonhang(iddonhang,idmathang,soluong,dongia,tensanpham,hinhanh,idkhachhang) VALUES ('$iddonhang','$idmathang','$soluong','$tongtien','$tensanpham','$hinhanh','$id')";
                $ketqua4 = mysqli_query($conn1,$sql4);

                $sql = "UPDATE hanghoa SET soluong = soluong - $soluong WHERE id= $idmathang";
                $ketqua = mysqli_query($conn1,$sql);

                $sql6 = "INSERT INTO thongke(tongtien,ngay,thang,nam,iddonhang) VALUES ('$tongtien','$ngay','$thang','$nam','$iddonhang')";
                $ketqua6 = mysqli_query($conn1,$sql6);
            }
            
        ?>
        <!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 style="text-align: center;">Bạn chắc chắn muốn mua loại hàng này chứ?</h2>        
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
                                        $STT =0;
                                        $conn5 =  mysqli_connect("localhost","root","","giuaki");
                                        $sql5 = "SELECT * FROM chitietdonhang WHERE iddonhang = $iddonhang";
                                        $ketqua5 = mysqli_query($conn5,$sql5);
                                    
                                        while($row5 = mysqli_fetch_array($ketqua5)){
                                            $STT ++;
                                            $total = $_GET['tongtien'];
                                            echo '<tr>';
                                            echo '  <td>'.$STT.'</td>';                                           
                                            echo '  <td><img src=" image/'.$row5['hinhanh'].'" style="width: 50px; height: 50px;" /> </td>';
                                            echo '  <td>'.$row5['tensanpham'].'</td>';
                                            echo '  <td>'.$row5['soluong'].'</td>';
                                            echo '</tr>';
                                        }
                                        
                                        echo ' <tr>';
                                        echo '   <td></td>';
                                        echo '   <td></td>';
                                        echo '   <td></td>';
                                        echo '   <td>Thành tiền:</td>';
                                        echo '   <td class="text-right">'.number_format($total).' VNĐ</td>';
                                        echo ' </tr>';
                                        echo '  <tr>';
                                        $ship = 100000;
                                        $tongcong = number_format($total+$ship);
                                        echo '    <td></td>';
                                        echo '    <td></td>';
                                        echo '    <td></td>';
                                        echo '    <td>Phí ship:</td>';
                                        echo '    <td class="text-right">'.number_format($ship).' VNĐ</td>';
                                        echo '  </tr>';
                                        echo '<tr>';
                                        echo '  <td></td>';
                                        echo '  <td></td>';
                                        echo '  <td></td>';
                                        echo '  <td><strong>Tổng cộng:</strong></td>';
                                        echo '  <td class="text-right"><strong>'.$tongcong.' VNĐ</strong></td>';
                                        echo '</tr>';
                                        echo '</tbody>';
                                        echo '</table>';
                                        echo '<div class="col mb-2">';
                                        echo '<div class="row">';
                                        echo '<div class="col-sm-12  col-md-6">';
                                        echo '      <button class="btn btn-block btn-light" style="background-color: #5BBD2B;"><a href="donhangall.php" style="text-decoration: none;color:white;">Đồng ý</a></button>';
                                        echo ' </div>';
                                        echo '<div class="col-sm-12 col-md-6 text-right">';
                                        echo '      <button class="btn btn-block btn-light" style="background-color: #FF0000;"><a href="xoadonhang.php?id='.$iddonhang.'" style="text-decoration: none;color: white;">Hủy đơn hàng</a></button>';
                                        echo '</div>';
                                            
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
