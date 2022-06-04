<?php 
    session_start();
    if(isset($_POST['submit']))
    {
        foreach($_POST['soluong'] as  $key => $value)
        {
            if(($value==0) and (is_numeric($value)))
            {
                unset ($_SESSION['cart'][$key]);
            }elseif(($value>0) and (is_numeric($value)))
            {
                $_SESSION['cart'][$key] = $value;
            }
        }
        header("location: cart.php");
    }
?>
<head>
        <title>Giỏ hàng</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="css/cart.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <!-- Responsive navbar-->
 <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #007b5e;">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../giuaki/index.php" style="color: white;font-weight: bold;">HoangHa.Co</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="tintucall.php" style="color: white;">Tin tức</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Sản phẩm</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../giuaki/productall.php">Tất cả sản phẩm</a></li>
                            <?php 
                                $conn = mysqli_connect("localhost","root","","giuaki");
                                $sql = "SELECT * FROM danhmuchanghoa";
                                $ketqua = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($ketqua)){
                                    echo '<li><a class="dropdown-item" href="../giuaki/product.php?id='.$row['id'].'">'.$row['tendanhmuc'].'</a></li>';
                                }
                                mysqli_close($conn);
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="donhangall.php" style="color: white;">Đơn hàng</a></li>
                        <?php 
                            if(isset($_SESSION['name'])){
                                $hoten = $_SESSION['name'];
                                $conn = mysqli_connect("localhost","root","","giuaki");
                                $sql = "SELECT * FROM username WHERE hoten = '$hoten'";
                                $ketqua = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($ketqua)){
                                    echo '<li class="nav-item" style="padding-left: 290px;padding-top:5px;color: white;"><img class="rounded-circle" style="width:30px;height:30px;margin-right:3px;" src=" image/'.$row['avata'].'"
                                    data-holder-rendered="true"><a style ="text-decoration: none;color: #F9F400;" href="../giuaki/updateinfo.php?id='.$row['id'].'">'.$_SESSION['name'].'</a><a href="logout.php" style="margin-left: 7px;text-decoration: none;color: red;">Đăng xuất</a></li>';
                                }
                            }else{
                                echo '<li class="nav-item" style="padding-left: 380px;"><a class="nav-link" style = "color: white;" href="../giuaki/login.php">Đăng nhập</a></li>';
                            }
                        ?>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit" id="giohang">
                            <i class="bi-cart-fill me-1"></i>
                            <a href="cart.php" style="text-decoration: none; color: white;">Giỏ hàng</a>
                                    <?php 
                                $ok =1;
                                if(isset($_SESSION['cart'])){
                                    foreach($_SESSION['cart'] as $k => $v){
                                        if(isset($v)){
                                            $ok = 2;
                                        }
                                    }
                                }
                                if($ok != 2){
                                    echo '<span class="badge bg-dark text-white ms-1 rounded-pill">0</span>';
                                }else{
                                    $items= $_SESSION['cart'];
                                    echo '<span class="badge bg-dark text-white ms-1 rounded-pill">'.count($items).'</span>';
                                }
                            ?>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">GIỎ HÀNG</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                        <?php 
                            $ok =1;
                            if(isset($_SESSION['cart']))
                            {
                                foreach($_SESSION['cart'] as $k => $v)
                                {
                                    if(isset($k))
                                    {
                                        $ok =2;
                                    }
                                }
                            }
                            if($ok == 2)
                            {
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    $item[] = $key;
                                }
                                $str = implode(",",$item);
                                $conn1 =  mysqli_connect("localhost","root","","giuaki");
                                $sql1 = "SELECT * FROM hanghoa WHERE id in ($str) order by id desc";
                                $ketqua1 = mysqli_query($conn1,$sql1);
                                //echo $ketqua1;
                                $total = 0;
                                echo '<thead>';
                                echo '<tr>';
                                echo '  <th scope="col"> </th>';   
                                echo '  <th scope="col">Sản phẩm</th>';
                                echo '  <th scope="col">Tình Trạng</th>';
                                echo '  <th scope="col" class="text-center">Số lượng</th>';
                                echo '  <th scope="col" class="text-center">Giá tiền</th>';
                                echo '  <th> </th>';
                                echo ' </tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo '<form action="cart.php" method="POST"';
                                while($row1 = mysqli_fetch_array($ketqua1)){  	
                                    echo '<tr>';                                   
                                    echo '  <td><img src=" image/'.$row1['hinhanh'].'" style="width: 50px; height: 50px;" /> </td>';
                                    echo '  <td>'.$row1['tenhang'].'</td>';
                                    echo '  <td>In stock</td>';
                                    echo '  <td><input class="form-control" name="soluong[' . $row1['id'] . ']" type="text" value="'. $_SESSION['cart'][$row1['id']] .'" /></td>';
                                    echo '  <td class="text-right">'.number_format($row1['dongia']).' VNĐ</td>';
                                    echo '  <td class="text-right"><a style="background-color: #CC0000;border-radius: 50%;" href="delcart.php?id='.$row1['id'].'"><i style="color: white;width: 40px;text-align: center;" class="fa fa-trash"></i></a> </td>';
                                    $total += $_SESSION['cart'][$row1['id']]*$row1['dongia'];
                                } 
                                    echo '</tr>';
                                    echo ' <tr>';
                                    echo '   <td></td>';
                                    echo '   <td></td>';
                                    echo '   <td></td>';
                                    echo '   <td></td>';
                                    echo '   <td>Thành tiền:</td>';
                                    echo '   <td class="text-right">'.number_format($total).' VNĐ</td>';
                                    echo ' </tr>';
                                    echo '  <tr>';
                                    $ship = 100000;
                                    $tongcong = number_format($total+$ship);
                                    echo '    <td></td>';
                                    echo '    <td></td>';
                                    echo '    <td></td>';
                                    echo '    <td></td>';
                                    echo '    <td>Phí ship:</td>';
                                    echo '    <td class="text-right">'.number_format($ship).' VNĐ</td>';
                                    echo '  </tr>';
                                    echo '<tr>';
                                    echo '  <td></td>';
                                    echo '  <td></td>';
                                    echo '  <td></td>';
                                    echo '  <td></td>';
                                    echo '  <td><strong>Tổng cộng:</strong></td>';
                                    echo '  <td class="text-right"><strong>'.$tongcong.' VNĐ</strong></td>';
                                    echo '</tr>';
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo ' </div>';
                                    echo ' </div>';
                                    echo '<div class="col mb-2">';
                                    echo '<div class="row">';
                                    echo '<div class="col-sm-12  col-md-3">';
                                    echo '      <button class="btn btn-block btn-light"><a href="productall.php" style="text-decoration: none;color: #28a745;">Tiếp tục mua hàng</a></button>';
                                    echo ' </div>';
                                    echo '<div class="col-sm-12 col-md-3 text-right">';
                                    echo '      <input type="submit" name="submit" value="Cập nhật giỏ hàng" style="background-color:#FFCC00;border-color: #FFCC00;" class="btn btn-lg btn-block btn-success text-uppercase">';
                                    echo '</div>';
                                    echo '<div class="col-sm-12  col-md-3" >';
                                    echo '<button class="btn btn-block btn-light" style="background-color: #CC0000;"><a href="delcart.php?id=0" style="text-decoration: none;color: white;">Xóa giỏ hàng</a></button>';
                                    echo '</div>';
                                    echo '<div class="col-sm-12 col-md-3 text-right">';
                                    if(isset($_SESSION['name'])){
                                        $hoten = $_SESSION['name'];
                                        $conn2 = mysqli_connect("localhost","root","","giuaki");
                                        $sql2 = "SELECT * FROM username WHERE hoten = '$hoten'";
                                        $ketqua2 = mysqli_query($conn2,$sql2);
                                        $row2 = mysqli_fetch_array($ketqua2);
                                        echo '<button class="btn btn-lg btn-block btn-success text-uppercase"><a style="text-decoration: none;color:azure;" href="donhang.php?id='.$row2['id'].'&&'.'tongtien='.$total.'">Thanh toán</a></button>';
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</form>';
                                    
        
                            }else{
                                echo '<p align="center">Bạn không có món nào trong giỏ hàng<br /><a href="index.php" style="color:#007b5e;">Mua hàng</a></p>';
                            }
                            
                            
                        ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
        <?php  include('../giuaki/html/scroll.html'); ?>
        <!-- Footer-->
        <?php 
            include('../giuaki/html/footer.html');
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>