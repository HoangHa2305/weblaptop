<?php
    $id = $_GET['iddanhmuc'];
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         $tendanhmuc = $_POST['tendanhmuc'];

         $conn = mysqli_connect("localhost","root","","giuaki");
         $sql = "UPDATE danhmuchanghoa SET tendanhmuc = '$tendanhmuc' WHERE id = $id";
         $ketqua = mysqli_query($conn,$sql);
         mysqli_close($conn);
         header("location: ../admin/quanlidanhmuc.php");
     }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục hàng hóa</title>
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
                    <h1 class="page-header">Cập nhật danh mục hàng hóa</h1>
                </div>
                 <!--end page header-->
            </div>
            <?php 
                $conn1 = mysqli_connect("localhost","root","","giuaki");
                $sql1 = "SELECT * FROM danhmuchanghoa WHERE id = $id ";
                $ketqua1 = mysqli_query($conn1,$sql1);
                $row1 = mysqli_fetch_array($ketqua1);
            ?>
            <form role="form" action="" method="POST">
                <div class="col-lg-6">
                <label>Tên danh mục</label>
                    <div class="form-group" style="display: flex;">
                        <input class="form-control" type="text" name="tendanhmuc" value="<?php echo $row1['tendanhmuc']; ?>">
                        <button type="submit" class="btn btn-warning">Cập nhật danh mục</button>
                    </div>
                </div>
            </form>

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
