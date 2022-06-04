<?php 
    session_start();
?>
<?php 
     $id = $_GET['id'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $trangthai = $_POST['trangthai'];
        $conn1 = mysqli_connect("localhost","root","","giuaki");
        $sql1 = "UPDATE donhang SET trangthai = '$trangthai' WHERE id = $id ";
        $ketqua1 = mysqli_query($conn1,$sql1);
        if(isset($ketqua1)){
            header('location: quanlidonhang.php');         
        }

    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật trạng thái đơn hàng</title>
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
                    <h1 class="page-header">Cập nhật trạng thái đơn hàng</h1>
                </div>
                 <!-- end  page header -->
            </div>
                <div class="col-lg-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">                        
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php 
                                $conn = mysqli_connect("localhost","root","","giuaki");
                                $sql = "SELECT * FROM donhang WHERE id = $id";
                                $ketqua = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_array($ketqua);
                            ?>
                            <form action="" method="POST">
                                <input type="text" name="trangthai" id="trangthai" value="<?php echo $row['trangthai']; ?>">
                                <input type="submit" value="Cập nhật">
                            </form>
                               
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
