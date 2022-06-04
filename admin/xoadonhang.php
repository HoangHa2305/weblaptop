<?php 
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM donhang WHERE id = $id";
    $ketqua = mysqli_query($conn,$sql);

    $sql1 = "DELETE FROM chitietdonhang WHERE iddonhang = $id";
    $ketqua1 = mysqli_query($conn,$sql1);

    $sql2 = "DELETE FROM thongke WHERE iddonhang = $id";
    $ketqua2 = mysqli_query($conn,$sql2);

    header('location: quanlidonhang.php');
    
?>