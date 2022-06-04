<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tin tức</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/tintuc.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $("#btnGui").click(function(){
                $.post("thembinhluan.php",
                {
                name: $("#tacgia").val(),
                noidung: $("#noidung").val(),
                idhanghoa : $("#idhanghoa").val(),
                avata : $("#avata").val()
                },
                function(data,status){
                $("#dsbinhluan").append('<div class="d-flex mb-4"><div class="flex-shrink-0"><img style="height: 50px; width: 50px;" class="rounded-circle" src="image/'+$("#avata").val()+'" alt="..." /></div><div class="ms-3"><div class="fw-bold">'+$("#tacgia").val()+'</div>' + $("#noidung").val()+' -  <p style="color:#1E90FF;">vừa xong</p></div></div>');
                $("#noidung").val('');
                });
            });
            });
        </script>
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include('menu.php'); ?>   
        <!-- Page content-->
        <div class="container mt-5">
        <?php
            $id = $_GET['id'];
            $conn = mysqli_connect("localhost","root","","giuaki");
            $sql = "SELECT * FROM tintuc WHERE id = $id";
            $ketqua = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($ketqua);
            echo '<div class="row">';
            echo '<div class="col-lg-8">';
            echo '<article>';
            echo    '<header class="mb-4">';
            echo        '<h1 class="fw-bolder mb-1">'.$row['tieude'].'</h1>';
            echo        '<div class="text-muted fst-italic mb-2">'.$row['thoigian'].' '.$row['ngay'].'</div>';
            echo     '</header>';
            echo    '<figure class="mb-4"><img class="img-fluid rounded" style="width:100%;" src="image/'.$row['hinhminhhoa'].'" alt="..." /></figure>';
            echo    '<section class="mb-5">';
            echo        '<p class="fs-5 mb-4" style="text-align: justify;">'.$row['noidung'].'</p>';
            echo        '<p style="margin-left: 73%;font-style: italic;">Người đăng: <b>'.$row['tacgia'].'</b></p>';
            echo    ' </section>';
            echo '</article>';
        ?>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                            <div id="dsbinhluan">
                                <?php
                                    $conn2 = mysqli_connect("localhost","root","","giuaki");
                                    $sql2 = "SELECT * FROM binhluan WHERE idhanghoa=" .$_GET['id'];
                                    $ketqua2 = mysqli_query($conn2,$sql2);
                                    while($row2 = mysqli_fetch_array($ketqua2)){
                                    echo '<div class="d-flex mb-4">';
                                    echo '<div class="flex-shrink-0"><img class="rounded-circle" style="height: 50px; width: 50px;" src=" image/'.$row2['avata'].'" alt="..." /></div>';
                                    echo '<div class="ms-3">';
                                    echo '<div class="fw-bold">'.$row2['tacgia'].'</div>';
                                    echo $row2['noidung'].'  '.'  - <a href="xoabinhluan.php?idtintuc='.$row['id'].'&&id='.$row2['id'].'" style="color: red;">Xóa</a><p style="color: #1E90FF;">'.$row2['thoigian'].'</p>';
                                    echo ' </div>';
                                    echo ' </div>';
                                    }
                                ?>
                            </div>
                            <!-- Comment form-->
                            <?php 
                                if(isset($_SESSION['name'])){
                                    $username = $_SESSION['name'];
                                    $conn4 = mysqli_connect("localhost","root","","giuaki");
                                    $sql4 = "SELECT * FROM username WHERE hoten = '$username'";
                                    $ketqua4 = mysqli_query($conn4,$sql4);
                                    $row4 = mysqli_fetch_array($ketqua4);
                                    echo '<div id="binhluan">';
                                    echo '  <input type="hidden" id="idhanghoa" value="'.$row['id'].'">';
                                    echo '  <input type="hidden" id="tacgia" value="'.$_SESSION['name'].'">';
                                    echo '  <input type="hidden" id="avata" value="'.$row4['avata'].'">';
                                    echo '  <input type="text" id="noidung" style="width: 70%;height: 100px;">';
                                    echo '  <input type="submit" value="Gửi" id="btnGui" style="background-color: #007b5e;border:#007b5e;color:white;border: 1px solid black;">';
                                    echo '</div>';
                                }
                            ?>
                                <!-- Comment with nested comments-->
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #007b5e;color:aliceblue">Danh mục</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    <?php 
                                        $conn1 = mysqli_connect("localhost","root","","giuaki");
                                        $sql1 = "SELECT * FROM danhmuctintuc";
                                        $ketqua1 = mysqli_query($conn1,$sql1);
                                        while($row1 = mysqli_fetch_array($ketqua1)){
                                            echo '<li><a href="danhmuctintuc.php?iddanhmuc='.$row1['id'].'" style="color: #007b5e;">'.$row1['tendanhmuc'].'</a></li>';
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <img src="https://tanthanhdanh.vn/wp-content/uploads/2020/10/TTD_Promotion_2010_DealGiaHoi_LaptopLG_Poster.jpg">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
