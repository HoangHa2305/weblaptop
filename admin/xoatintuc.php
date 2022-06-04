<?php 
    $id = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","giuaki");
    $sql = "DELETE FROM tintuc WHERE id=$id";
    $ketqua = mysqli_query($conn,$sql);
    header('location: quanlitintuc.php');
?>