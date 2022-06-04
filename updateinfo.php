<?php 
    session_start();
?>
<?php 
      $id = $_GET['id'];
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $user = $_POST['user'];
      $sdt = $_POST['sdt'];
      $diachi = $_POST['diachi'];
      $avata = $_POST['avata'];
   
      $conn1 = mysqli_connect("localhost","root","","giuaki");
      $sql1 = "UPDATE username SET hoten = '$name', username = '$user' , sdt = '$sdt', email = '$email', avata = '$avata', diachi = '$diachi' WHERE id = '$id' ";
      $ketqua1 = mysqli_query($conn1,$sql1);
      if(isset($ketqua1)){
        header('location: index.php');
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/updateinfo.css" rel="stylesheet" />
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<section class="get-in-touch">
   <h5 class="title">Thông tin cá nhân</h5>
   <?php
      $conn = mysqli_connect("localhost","root","","giuaki");
      $sql = "SELECT * FROM username WHERE id = $id";
      $ketqua = mysqli_query($conn,$sql);
      $thongtin = mysqli_fetch_array($ketqua);
   ?>
   <form class="contact-form row" action="" method="POST">
      <div class="form-field col-lg-6">
         <input id="name" name="name" value="<?php  echo $thongtin['hoten'];?>" class="input-text js-input" type="text" style="margin-left: 5px;" required>
         <label class="label" for="name" style="margin-bottom: 15px;">Họ và tên</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" name="email"  value="<?php  echo $thongtin['email'];?>" class="input-text js-input" type="email" style="margin-left: 5px;" required>
         <label class="label" for="email" style="margin-bottom: 15px;">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" name="user"  value="<?php  echo $thongtin['username'];?>" class="input-text js-input" type="text" style="margin-left: 5px;" required>
         <label class="label" for="company" style="margin-bottom: 15px;">Tên đăng nhập</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" name="sdt"  value="<?php  echo $thongtin['sdt'];?>" class="input-text js-input" type="number" style="margin-left: 5px;" required>
         <label class="label" for="phone" style="margin-bottom: 15px;">Số điện thoại</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" name="diachi"  value="<?php  echo $thongtin['diachi'];?>" class="input-text js-input" type="text" style="margin-left: 5px;" required>
         <label class="label" for="phone" style="margin-bottom: 50px;">Địa chỉ nhận hàng:</label>
      </div>
         <img style="width: 130px;height:130px;margin-left: 50px;border-radius: 50%;" src="<?php echo 'image/'. $thongtin['avata']; ?>"><br>
         <input type="file" name="avata" id="avata">
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Cập nhật">
         <a href="../giuaki/index.php" style="margin-left: 30px;color: #551A8B;">Quay trở lại</a>
      </div>
   </form>
</section>
</body>
</html>