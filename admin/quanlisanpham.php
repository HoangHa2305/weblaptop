<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Quản lí sản phẩm</title>
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
    <?php include('nav.php');?>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <div id="page-wrapper">   
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-14">
                    <h1 class="page-header">Quản lí sản phẩm</h1>
                    <button type="button" class="btn btn-success"><a href="themsanpham.php" style="text-decoration: none;color:white;">Thêm sản phẩm</a></button>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng còn</th>
                                            <th>Mô tả</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $STT =1;
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql = "SELECT * FROM hanghoa ORDER BY id DESC ";
                                        $ketqua = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_array($ketqua)){
                                            echo '<tr class="odd gradeX">';
                                            echo '  <td>'.$STT.'</td>';
                                            echo '  <td><img style="width: 50px;height: 50px;"  src=" ../image/'.$row['hinhanh'].'"></td>';
                                            echo '  <td>'.$row['tenhang'].'</td>';
                                            echo '  <td class="center">'.$row['dongia'].'</td>';
                                            echo '  <td class="center">'.$row['soluong'].'</td>';
                                            echo '  <td class="center">'.substr($row['mota'],0,23).'.....</td>';
                                            echo '  <td><a href="capnhatsanpham.php?id='.$row['id'].'" style="color: #00F5FF;">Chỉnh sửa</a> | <a href="../admin/xoasanpham.php?id='.$row['id'].'&tenhanghoa='.$row['tenhang'].'" style="color: #FF0000;"> Xóa</a></td>';
                                            echo '</tr>';
                                            $STT++;
                                        }
                                    ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
