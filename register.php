<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="css/login.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $avata = $_POST['avata'];
        $diachi = $_POST['diachi'];
        $conn = mysqli_connect("localhost","root","","giuaki");
        $sql = "INSERT INTO username(hoten,username,pass,sdt,email,avata,diachi) VALUES ('$name','$username','$password','$phone','$mail','$avata','$diachi')";
        $ketqua = mysqli_query($conn,$sql);
        $_SESSION['name']= $name;  
        header('location:../giuaki/index.php');     
    }
?>
<div class="container">
  <section id="content">
    <form action="" method="POST">
      <h1>ĐĂNG KÍ</h1>
      <div>
        <input type="text" placeholder="Họ và tên" name="name" id="username" />
      </div>
      <div>
        <input type="text" placeholder="Tên đăng nhập" name="username" id="username" />
      </div>
      <div>
        <input type="text" placeholder="Email" name="mail" id="username" />
      </div>
      <div>
        <input type="text" placeholder="Số điện thoại" name="phone" id="username" />
      </div>
      <div>
        <input type="text" placeholder="Địa chỉ" name="diachi" id="" />
      </div>
      <div>
        <input type="password" placeholder="Mật khẩu" name="password" id="password" />
      </div>
      <div>
        Ảnh đại diện: 
        <input type="file" placeholder="Ảnh đại diện" name="avata" id="avata" />
      </div>
      <div>
        <input type="submit" value="Đăng kí" />
        <a href="../giuaki/login.php">Đăng nhập</a>
        <a href="#">Bạn đã có tài khoản?</a>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->
</body>
</html>