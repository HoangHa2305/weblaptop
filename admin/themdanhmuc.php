<?php 
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         $tendanhmuc = $_POST['tendanhmuc'];

         $conn = mysqli_connect("localhost","root","","giuaki");
         $sql = "INSERT INTO danhmuchanghoa(tendanhmuc) VALUES ('$tendanhmuc')";
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
                    <h1 class="page-header">Thêm danh mục hàng hóa</h1>
                </div>
                 <!--end page header-->
            </div>
            <form role="form" action="" method="POST">
                <div class="col-lg-6">
                <label>Tên danh mục</label>
                    <div class="form-group" style="display: flex;">
                        <input class="form-control" type="text" name="tendanhmuc">
                        <button type="submit" class="btn btn-info">Thêm danh mục</button>
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
