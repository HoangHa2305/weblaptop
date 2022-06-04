<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đơn hàng</title>
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
                    <h1 class="page-header">Quản lí đơn hàng</h1>
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
                                            <th>Tên người mua</th>
                                            <th>Thời gian mua</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $stt =1;
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql = "SELECT * FROM donhang ";
                                        $ketqua = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($ketqua)){
                                            echo '<tr class="success">';
                                            echo '  <td>'.$stt.'</td>';
                                            $ten = $row['idkhachhang'];
                                            $conn1 = mysqli_connect("localhost","root","","giuaki");
                                            $sql1 = "SELECT * FROM username WHERE   id = $ten "; 
                                            $ketqua1 = mysqli_query($conn1,$sql1);
                                            $row1 = mysqli_fetch_array($ketqua1);  
                                            echo '  <td>'.$row1['hoten'].'</td>';
                                            echo '  <td>'.$row['ngaymua'].'</td>';
                                            echo '  <td>'.number_format($row['tongtien']).'</td>';
                                            echo '  <td>'.$row['trangthai'].'</td>';
                                            echo '  <td><a href="../admin/capnhattrangthai.php?id='.$row['id'].'" style="color: #008080">Sửa trạng thái</a> | <a href="Quanlichitietdonhang.php?id='.$row['id'].'" style="color: #7D26CD">Xem chi tiết</a></td>';
                                            echo '  <td><a href="xoadonhang.php?id='.$row['id'].'" style="color:#CC0000">Xóa đơn hàng</a></td>';
                                            echo '</tr>';
                                            $stt++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
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
