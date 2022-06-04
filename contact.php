<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $conn = mysqli_connect("localhost","root","","giuaki");
        $sql = "INSERT INTO contact(email,noidung,ten) VALUES ('$email','$message','$name')";
        $ketqua = mysqli_query($conn,$sql);
        if(isset($ketqua)){
            header('location: index.php');
        }

    }
?>
<head>
    <title>Liên hệ với chúng tôi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>
<style>
    .jumbotron {
    background: #358CCE;
    color: whitesmoke;
    border-radius: 0px;
    }
    .jumbotron small {
    color: #FFF;
    }
    .h1 small {
    font-size: 24px;
}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="jumbotron jumbotron-sm" style="background-color: #007b5e;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1" style="color: white;">
                    Liên hệ với chúng tôi
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Địa chỉ Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Ý kiến</label>
                            <textarea name="message" id="message" name="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs" style="background-color: #007b5e; border-color: #007b5e;" >
                            Gửi liên hệ</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Cửa hàng chúng tôi</legend>
            <address>
                <strong>HoangHa.Co</strong><br>
                470 Trần Đại Nghĩa,
                Ngũ Hành Sơn,Đà Nẵng<br>
                <p title="Phone">
                    SĐT: 0123456789
                </p>
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="#" style="color: #007b5e;">first.last@example.com</a>
            </address>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <a href="index.php" style="color: #007b5e;">Quay lại trang chủ</a>
        </div>
    </div>
</div>