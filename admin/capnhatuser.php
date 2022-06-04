<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_GET['id'];
        $hoten = $_POST['hoten'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $sodienthoai = $_POST['sodienthoai'];
        $diachi = $_POST['diachi'];
        $avata = $_POST['avata'];

        $conn = mysqli_connect("localhost","root","","giuaki");
        $sql = "UPDATE username SET hoten ='$hoten' , username ='$username', email ='$email',sdt ='$sodienthoai' ,avata='$avata' , diachi = '$diachi' WHERE id = $id";
        $ketqua = mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("location: ../admin/taikhoan.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Cập nhật Thông tin</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
</head>

<body>
<?php include('nav.php'); ?>
<div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Cập nhật thông tin người dùng</h1>
                </div>
                <!--end page header -->
</div>
<?php 
     $conn = mysqli_connect("localhost","root","","giuaki");
     $sql = "SELECT * FROM username WHERE id=".$_GET['id'];
     $ketqua = mysqli_query($conn,$sql);
     $thongtin = mysqli_fetch_array($ketqua);
?>
    <form role="form" action="" method="POST">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Họ và tên</label>
            <input class="form-control" type="text" name="hoten" value="<?php echo $thongtin['hoten']; ?>">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username" value="<?php echo $thongtin['username']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="<?php echo $thongtin['email']; ?>">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" type="number" name="sodienthoai" value="<?php echo $thongtin['sdt']; ?>">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input class="form-control" type="text" name="diachi" value="<?php echo $thongtin['diachi']; ?>">
        </div>
        <div class="form-group" style="text-align: center;">
            <input type="submit" value="Cập nhật" style="font-size: 18px;background-color: #04B173;border: 1px solid #04B173">
        </div>
    </div>
    <div class="col-lg-6">
        <img src="<?php echo '../image/'.$thongtin['avata']; ?>" style="width: 200px;height: 200px;border-radius: 50%;"><br><br>
        <input type="file" name="avata" id="avata">
    </div>
    </form>
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
