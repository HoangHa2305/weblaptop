<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí tin tức</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />


</head>

<body>
    <?php include('nav.php');?>
    <div id="page-wrapper">
            <div class="row">
                 <!--page header-->
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lí tin tức</h1>
                    <button type="button" class="btn btn-success"><a style="text-decoration: none;color: white;" href="themtintuc.php">Thêm bài viết</a></button>
                </div>
                 <!--end page header-->
            </div>
            <div class="row">
                 <!--Default Pannel, Primary Panel And Success Panel   -->
                <?php
                    $iddanhmuc = $_GET['iddanhmuc']; 
                    $conn = mysqli_connect("localhost","root","","giuaki");
                    $sql = "SELECT * FROM tintuc WHERE iddanhmuc = $iddanhmuc ORDER BY id DESC";
                    $ketqua = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($ketqua)){
                        echo ' <div class="col-lg-4">';
                        echo '<div class="panel panel-success">';
                        echo ' <img style="width: 296px;height: 180px;" src="../image/'.$row['hinhminhhoa'].'">';
                        echo '<br>';
                        echo '<b>'.$row['tieude'].'</b>';
                        echo '<div class="panel-body">';
                        echo '<p>'.substr($row['noidung'],0,160).'</p>';    
                        echo '</div>';
                        echo '<div class="panel-footer" style="text-align:center;">';
                        echo '<a href="capnhattintuc.php?id='.$row['id'].'" style="color: #009900;">Cập nhật</a>   |   <a href="../admin/xoatintuc.php?id='.$row['id'].'" style="color: #CC0000;">Xóa</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
                  <!--End Default Pannel, Primary Panel And Success Panel   -->
            </div>
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
