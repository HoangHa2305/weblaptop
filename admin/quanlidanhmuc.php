<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục hàng hóa</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />


</head>

<body>
    <?php include('nav.php'); ?>
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!--page header-->
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục hàng hóa</h1>
                </div>
                 <!--end page header-->
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <button type="button" class="btn btn-success"><a href="themdanhmuc.php" style="text-decoration: none;color:white;">Thêm danh mục</a></button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">
                                                Tên danh mục
                                            </th>
                                            <th style="text-align: center;">
                                               Chi tiết danh mục
                                            </th>
                                            <th style="text-align: center;">
                                                Thao tác
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $STT = 1;
                                            $conn = mysqli_connect("localhost","root","","giuaki");
                                            $sql = "SELECT * FROM danhmuchanghoa";
                                            $ketqua = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_array($ketqua)){
                                                echo '<tr>';
                                                echo '<td style="text-align: center;">'.$STT.'</td>';
                                                echo '<td style="text-align: center;">'.$row['tendanhmuc'].'</td>';
                                                echo '<td style="text-align: center;">';
                                                echo '  <a href="chitietdanhmuc.php?iddanhmuc='.$row['id'].'" style="color: #68228B;">Xem chi tiết danh mục</a>';
                                                echo '</td>';
                                                echo '<td style="text-align: center;">';
                                                echo '  <button type="button" class="btn btn-warning btn-circle"><a href="capnhatdanhmuchanghoa.php?iddanhmuc='.$row['id'].'"><i class="fa fa-link" style="color:white;"></i></a></button>';
                                                echo '  <button type="button" class="btn btn-danger btn-circle"><a href="xoadanhmuchanghoa.php?iddanhmuc='.$row['id'].'"><i class="fa fa-times" style="color:white;"></i></a></button>';
                                                echo '</td>';
                                                echo '</tr>';
                                                $STT++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
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

</body>

</html>
