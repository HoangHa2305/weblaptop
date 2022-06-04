<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $hoten = $_POST['hoten'];
        $username = $_POST['username'];
        $pass = md5($_POST['pass']);
        $email = $_POST['email'];
        $sodienthoai = $_POST['sodienthoai'];
        $diachi = $_POST['diachi'];
        $avata = $_POST['avata'];

        $conn = mysqli_connect("localhost","root","","giuaki");
        $sql = "INSERT INTO username (hoten,username,pass,email,sdt,diachi,avata) VALUES ('$hoten','$username','$pass','$email','$sodienthoai','$diachi','$avata')";
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
    <title>Thêm người dùng</title>
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
                    <h1 class="page-header">Thêm người dùng</h1>
                </div>
                <!--end page header -->
</div>
    <form role="form" action="" method="POST">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Họ và tên</label>
            <input class="form-control" type="text" name="hoten">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input class="form-control" type="password" name="pass">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" type="number" name="sodienthoai">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input class="form-control" type="text" name="diachi">
        </div>
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="avata">
        </div>
        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-outline btn-success">Thêm người dùng</button>
        </div>
    </div>
    <div class="col-lg-6">
        
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
