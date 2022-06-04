<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hộp thư</title>
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
                    <h1 class="page-header">Hộp thư</h1>
                </div>
                 <!-- end  page header -->
            </div>
                <div class="col-lg-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">                        
                        <div class="panel-body">
                        <section class="mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <?php
                                        $conn = mysqli_connect("localhost","root","","giuaki");
                                        $sql = "SELECT * FROM contact";
                                        $ketqua = mysqli_query($conn,$sql);
                                        echo '<div class="panel panel-default">';
                                        while($row = mysqli_fetch_array($ketqua)){
                                        echo '<div class="d-flex mb-4" style="margin-bottom: 30px;">';
                                        echo '<div class="alert alert-warning"><b>'.$row['ten'].': </b>'.$row['noidung'].'<small>Gmail: '.$row['email'].' </small> - <a href="xoahopthu.php?id='.$row['id'].'" class="alert-link">Xóa thư</a>';
                                        echo ' </div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </section>    
                        </div>
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
