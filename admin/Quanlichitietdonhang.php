<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <?php include('nav.php'); ?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết đơn hàng</h1>
                </div>
                 <!-- end  page header -->
            </div>
                <div class="col-lg-12">
                     <!--    Context Classes  -->
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
                                            echo '  <td><img src=" ../image/'.$row['hinhanh'].'" style="width: 50px; height: 50px;" /> </td>';
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
                                    $conn2 = mysqli_connect("localhost","root","","giuaki");
                                    $sql2 = "SELECT * FROM donhang WHERE id= $id";
                                    $ketqua2 = mysqli_query($conn2,$sql2);
                                    $row2 = mysqli_fetch_array($ketqua2);

                                    $khachhang = $row2['idkhachhang'];
                                    $conn1 = mysqli_connect("localhost","root","","giuaki");
                                    $sql1 = "SELECT * FROM username WHERE id= $khachhang";
                                    $ketqua1 = mysqli_query($conn1,$sql1);
                                    $row1 = mysqli_fetch_array($ketqua1);
                                    echo '<b>Địa chỉ nhận hàng:</b> '.$row1['diachi'];
                                    echo '<br>';
                                    echo '<b>Số điện thoại nhận hàng:</b> '.$row1['sdt'];
                                    echo '<br>';

                                    
                                    echo '<b>Trạng thái đơn hàng:</b> '.$row2['trangthai'];
                                    echo '<br>';
                                    echo '<a href="quanlidonhang.php">Quay trở lại</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
