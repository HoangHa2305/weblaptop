<?php 
    $id = $_GET['iddanhmuc'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM danhmuchanghoa WHERE id=$id";
    $ketqua = mysqli_query($conn,$sql);
    header('location: ../admin/quanlidanhmuc.php');
?>