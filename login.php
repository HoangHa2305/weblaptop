<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="css/login.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $conn = mysqli_connect("localhost","root","","giuaki");
        $sql = "SELECT * FROM username WHERE username='$username' AND pass ='$password'";
        $ketqua = mysqli_query($conn,$sql);
        $soluong = 0;
        if(isset($ketqua))
            $soluong = mysqli_num_rows($ketqua);
        if($soluong>0){
            $row = mysqli_fetch_array($ketqua);
              $_SESSION['name'] = $row['hoten'];
              $_SESSION['role'] = $row['role'];
              if($row['role'] == 'admin'){
                header("location:  admin/index.php "); 
              }else{
                $_SESSION['name'] = $row['hoten'];
                header("location: index.php ");
              }
        }else{
          echo '<script>alert("Tên đăng nhập hoặc mật khẩu sai");</script>';
        }

    }
?>
<div class="container">
  <section id="content">
    <form action="" method="POST">
      <h1>ĐĂNG NHẬP</h1>
      <div>
        <input type="text" placeholder="Username" name="username" id="username" />
      </div>
      <div>
        <input type="password" placeholder="Password" name="password" id="password" />
      </div>
      <div>
        <input type="submit" value="Đăng nhập" />
        <a href="../giuaki/register.php">Đăng kí</a>
        <a href="#">Bạn chưa có tài khoản?</a>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->
  
</body>
</html>