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
                                    echo '<li class="nav-item" style="padding-left: 290px;padding-top:5px;color: white;"><img class="rounded-circle" style="width:30px;height:30px;margin-right:3px;" src="image/'.$row['avata'].'"
                                    data-holder-rendered="true"><a style ="text-decoration: none;color: #F9F400;" href="../giuaki/updateinfo.php?id='.$row['id'].'">'.$_SESSION['name'].'</a><a href="logout.php" style="margin-left: 7px;text-decoration: none;color: red;">Đăng xuất</a></li>';
                                }
                            }else{
                                echo '<li class="nav-item" style="padding-left: 380px;"><a class="nav-link" style = "color: white;" href="../giuaki/login.php">Đăng nhập</a></li>';
                            }
                        ?>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark">
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